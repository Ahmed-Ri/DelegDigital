<?php

namespace App\Http\Controllers;

use App\Models\Compagne;
use App\Models\ImageUpload;
use App\Models\Indicateur;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ChartController extends Controller
{
    public function afficherGraphique(Request $request)
    {
        $users = User::all(); 
        $compagnes = Compagne::all();
        $imageUpload = ImageUpload::all();
        $users = Auth::user();
        $derniereCompagne =  Compagne::with('images')->where('user_id', auth()->user()->id)->latest()->first();     
        $derniereImages = $derniereCompagne ? $derniereCompagne->images : collect();
        
        $indicateurs = Indicateur::all();
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $userId = Auth::id();
        $derniereNoteFacebook = Indicateur::where('user_id', $userId)->latest('date')->first()->note_facebook ?? null;
        $derniereNoteInstagram = Indicateur::where('user_id', $userId)->latest('date')->first()->note_instagram ?? null;
        $derniereNoteGoogle = Indicateur::where('user_id', $userId)->latest('date')->first()->note_google ?? null;
        $derniereNoteSite = Indicateur::where('user_id', $userId)->latest('date')->first()->note_site ?? null;
        $derniereTraficFacebook = Indicateur::where('user_id', $userId)->latest('date')->first()->trafic_facebook ?? null;
        $derniereTraficInstagram = Indicateur::where('user_id', $userId)->latest('date')->first()->trafic_instagram ?? null;
        $derniereTraficGoogle = Indicateur::where('user_id', $userId)->latest('date')->first()->trafic_google ?? null;
        $derniereTraficSite = Indicateur::where('user_id', $userId)->latest('date')->first()->trafic_site ?? null;
        $Commentaire_facebook = Indicateur::where('user_id', $userId)->latest('date')->first()->commentaire_facebook ?? null;
        $Commentaire_instagram = Indicateur::where('user_id', $userId)->latest('date')->first()->commentaire_instagram ?? null;
        $Commentaire_google = Indicateur::where('user_id', $userId)->latest('date')->first()->commentaire_google ?? null;
        $Commentaire_site = Indicateur::where('user_id', $userId)->latest('date')->first()->commentaire_site ?? null;
        $Observation = Indicateur::where('user_id', $userId)->latest('date')->first()->observation ?? null;
        $Dates = Indicateur::where('user_id', $userId)->latest('date')->first()->date ?? null;
        $daterange = $request->input('daterange', '');

            // Aucune plage de dates spécifiée : récupérer les indicateurs pour les 3 dernières dates
            $now = Carbon::now();
            $months = collect();
            for ($i = 11; $i >= 0; $i--) {
                $month = $now->copy()->subMonths($i)->format('Y-m');
                $months->put($month, [
                    'trafic_facebook' => null, // Initialisez avec des valeurs par défaut
                    'trafic_instagram' => null,
                    'trafic_google' => null,
                    'trafic_site' =>null,
                    'note_facebook' =>null,
                    'note_instagram' => null,
                    'note_google' => null,
                    'note_site' => null,
                    'apparitionSite' => null
                ]);
            }
            
            // Récupérer les données existantes pour les 12 derniers mois
            $indicateurs = Indicateur::where('user_id', $userId)
                            ->where('date', '>=', $now->subMonths(12)->startOfMonth())
                            ->orderBy('date', 'asc')
                            ->get()
                            ->groupBy(function($date) {
                                return Carbon::parse($date->date)->format('Y-m'); // Group by month and year
                            });
            
            // Fusionner les données récupérées avec les mois générés
            $months = $months->map(function ($default, $month) use ($indicateurs) {
                return $indicateurs->has($month) ? $indicateurs->get($month)->first() : $default;
            });
            
            // Préparation des données pour le graphique
            $labels = $months->keys();
            $traficFacebook = $months->pluck('trafic_facebook');
            $traficInstagram = $months->pluck('trafic_instagram');
            $traficGoogle = $months->pluck('trafic_google');
            $traficSite = $months->pluck('trafic_site');
            $note_facebook = $months->pluck('note_facebook');
            $note_instagram = $months->pluck('note_instagram');
            $note_google = $months->pluck('note_google');
            $note_site = $months->pluck('note_site');
            // Traitement des termes
        $terms = Indicateur::where('user_id', $userId)->pluck('termes')->last();
        $termsArray = explode(',', $terms);

        return view('dashboard', compact('termsArray','Dates','Observation','Commentaire_site','Commentaire_google','Commentaire_instagram','Commentaire_facebook','derniereTraficFacebook','derniereImages','derniereTraficInstagram','derniereTraficGoogle','derniereTraficSite', 'derniereNoteFacebook', 'derniereNoteInstagram', 'derniereNoteGoogle', 'derniereNoteSite','labels', 'indicateurs', 'users','compagnes','derniereCompagne' ,'traficFacebook', 'traficInstagram', 'traficGoogle', 'traficSite', 'note_facebook', 'note_instagram', 'note_google', 'note_site'));
    }
    
       
}
 // if (!empty($daterange)) {
        //     $dates = explode(' - ', $daterange);
        //     if (count($dates) === 2) {
        //         try {
        //             $startDate = Carbon::createFromFormat('d/m/Y', $dates[0])->startOfDay();
        //             $endDate = Carbon::createFromFormat('d/m/Y', $dates[1])->endOfDay();

        //             $indicateurs = Indicateur::where('user_id', $userId)
        //                 ->whereBetween('date', [$startDate, $endDate])
        //                 ->orderBy('date', 'desc')
        //                 ->get();
        //         } catch (\Exception $e) {
        //             // Gérer l'exception si la conversion des dates échoue
        //             $indicateurs = collect(); // Collection vide pour éviter les erreurs
        //         }
        //     }
        // } else {}