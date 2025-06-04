@extends('layouts.app')

@section('content')
    <div style="max-width:800px; margin:40px auto;">
        <h2 style="text-align:center; margin-bottom:30px;">Événements par prestataire</h2>
        
        <div style="margin-bottom:30px; text-align:center;">
            <select id="prestataire-select" style="padding:8px; width:300px; margin-right:10px;">
                <option value="">Sélectionner un prestataire</option>
                @foreach($prestataires as $prestataire)
                    <option value="{{ $prestataire->id }}">{{ $prestataire->nom }} ({{ $prestataire->type }})</option>
                @endforeach
            </select>
        </div>
        
        <div id="loading" style="text-align:center; display:none;">
            Chargement en cours...
        </div>
        
        <div id="evenements-container">
            <p style="text-align:center;">Veuillez sélectionner un prestataire pour voir ses événements.</p>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const prestataireSelect = document.getElementById('prestataire-select');
            const evenementsContainer = document.getElementById('evenements-container');
            const loadingIndicator = document.getElementById('loading');
            
            prestataireSelect.addEventListener('change', function() {
                const prestataireId = this.value;
                
                if (!prestataireId) {
                    evenementsContainer.innerHTML = '<p style="text-align:center;">Veuillez sélectionner un prestataire pour voir ses événements.</p>';
                    return;
                }
                
                // Afficher l'indicateur de chargement
                loadingIndicator.style.display = 'block';
                evenementsContainer.style.display = 'none';
                
                // Faire la requête AJAX avec Axios
                axios.get(`/api/evenements/par-prestataire/${prestataireId}`)
                    .then(function(response) {
                        loadingIndicator.style.display = 'none';
                        evenementsContainer.style.display = 'block';
                        
                        const evenements = response.data;
                        
                        if (evenements.length === 0) {
                            evenementsContainer.innerHTML = '<p style="text-align:center;">Aucun événement trouvé pour ce prestataire.</p>';
                            return;
                        }
                        
                        // Construire le tableau HTML
                        let tableHtml = `
                            <table style="width:100%; border-collapse:collapse;">
                                <thead>
                                    <tr style="background:#f5f5f5;">
                                        <th style="padding:10px; border:1px solid #ddd;">ID</th>
                                        <th style="padding:10px; border:1px solid #ddd;">Nom</th>
                                        <th style="padding:10px; border:1px solid #ddd;">Type</th>
                                        <th style="padding:10px; border:1px solid #ddd;">Lieu</th>
                                        <th style="padding:10px; border:1px solid #ddd;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                        `;
                        
                        evenements.forEach(function(evenement) {
                            tableHtml += `
                                <tr>
                                    <td style="padding:10px; border:1px solid #ddd;">${evenement.id}</td>
                                    <td style="padding:10px; border:1px solid #ddd;">${evenement.nom}</td>
                                    <td style="padding:10px; border:1px solid #ddd;">${evenement.type}</td>
                                    <td style="padding:10px; border:1px solid #ddd;">${evenement.lieu}</td>
                                    <td style="padding:10px; border:1px solid #ddd;">${evenement.date}</td>
                                </tr>
                            `;
                        });
                        
                        tableHtml += `
                                </tbody>
                            </table>
                        `;
                        
                        evenementsContainer.innerHTML = tableHtml;
                    })
                    .catch(function(error) {
                        loadingIndicator.style.display = 'none';
                        evenementsContainer.style.display = 'block';
                        evenementsContainer.innerHTML = '<p style="text-align:center; color:red;">Erreur lors du chargement des événements.</p>';
                        console.error(error);
                    });
            });
        });
    </script>
    @endpush
@endsection