<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Characters;


class DashboardController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $client = new Client();
        $page = $request->query('page', 1); // Get the current page from the request, default to 1

        $itemsPerPage = 12; // Set the number of items per page to 12

        // Fetch people list from API with pagination
        $response = $client->get("https://swapi.dev/api/people/?page={$page}");
        $data = json_decode($response->getBody(), true);

        $people = $data['results'];
        $isPaginationRequired = $data['count'] > $itemsPerPage;
        $totalPages = ceil($data['count'] / $itemsPerPage);
        $previousPage = $data['previous'] ? explode('=', $data['previous'])[1] : null;
        $nextPage = $data['next'] ? explode('=', $data['next'])[1] : null;

        // Fetch individual character details if $id is provided
        $character = null;
        if ($id) {
            $response = $client->get("https://swapi.dev/api/people/{$id}/");
            if ($response->getStatusCode() == 200) {
                $character = json_decode($response->getBody(), true);
            }
        }

        // Pass $page to the view
        return view('characters', compact(
            'people',
            'character',
            'isPaginationRequired',
            'totalPages',
            'previousPage',
            'nextPage',
            'id',
            'page' // Pass the $page variable here
        ));
    }

    public function saveCharacter(Request $request)
    {
        $client = new Client();

        // Get the character ID from the request
        $id = $request->input('id');  

        try {
            // Fetch character details from the SWAPI API
            $response = $client->get("https://swapi.dev/api/people/{$id}/");

            // Decode the API response
            $characterData = json_decode($response->getBody(), true);

            // Save a new character record regardless of duplicates
            $character = new Characters();
            $character->id_char = $id; // Retain original ID for reference
            $character->name = $characterData['name'];
            $character->height = $characterData['height'];
            $character->gender = $characterData['gender'];
            $character->mass = $characterData['mass'];
            $character->hair_color = $characterData['hair_color'];
            $character->skin_color = $characterData['skin_color'];
            $character->eye_color = $characterData['eye_color'];
            $character->birth_year = $characterData['birth_year'];
            $character->homeworld = $characterData['homeworld'];
            $character->save();

        } catch (\Exception $e) {
            // Handle exceptions such as network errors or missing data
            return redirect()->route('characters')->with('error', 'Failed to save character. Please try again.');
        }

        // Redirect back with a success message
        return redirect()->route('characters')->with('success', 'Character saved for later use!');
    }

    

    public function deleteCharacter($id)
    {
        // Find the character by ID
        $character = Characters::where('id', $id)->first();

        if ($character) {
            // Delete the character if found
            $character->delete();
            return redirect()->route('user.characters')->with('success', 'Character deleted from saved list.');
        } else {
            // Handle the case where the character is not found
            return redirect()->route('user.characters')->with('error', 'Character not found.');
        }
    }

    // Saved Characters

    public function display_char(Request $request, $id = null)
    {
        // Fetch all saved characters
        $characters = Characters::paginate(12);
    
        // Fetch specific character if ID is provided
        $character = null;
        if ($id) {
            $character = Characters::find($id);
        }
    
        // Pass data to the view
        return view('user.characters', compact('characters', 'character', 'id'));
    }

    public function protectedPage()
    {
        // Check if user is logged in
        if (!auth()->check()) {
            // If not, log out and redirect to login page
            return redirect()->route('login');
        }
        return view('characters');
    }

    // public function viewsaveDetails(Request $request, $id = null)
    // {

    // }
    
}
