@extends('layouts.app')

@section('contenus')
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="container mt-5">
        <h1 class="mb-4">Créer un Utilisateur</h1>

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Section Informations de base -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <div class="mb-3">
                            <label class="form-label required">Nom complet</label>
                            <input type="text" name="name" class="form-control"
                                   required pattern=".{3,50}" title="3 à 50 caractères">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label required">Email</label>
                            <input type="email" name="email" class="form-control"
                                   required placeholder="exemple@domain.com">
                            <input type="email" name="email_confirmation"
                                   class="form-control mt-2" placeholder="Confirmez l'email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmation du mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Photo de profil</label>
                            <input type="file" name="photo" class="form-control"
                                   accept="image/jpeg,image/png,image/webp">
                            <div class="form-text">Formats acceptés: JPG, PNG, WEBP (max 2MB)</div>
                        </div>
                    </div>
                </div>

                <div class="tab-content border-start border-end border-bottom p-4">
                    <!-- Onglet Rôles -->
                    <div class="tab-pane fade show active" id="nav-roles">
                        <div class="mb-3">
                            <label class="form-label required">Rôle principal</label>
                            <select name="role_id" class="form-select" required>
                                <option value="">Sélectionnez un rôle</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Accès aux modules</label>
                            <div class="row row-cols-2 row-cols-md-3 g-3">
                                @foreach($modules as $module)
                                    <div class="col">
                                        <div class="form-check card card-body">
                                            <input type="checkbox" name="module_access[]"
                                                   value="{{ $module }}"
                                                   class="form-check-input"
                                                   id="module-{{ $module }}">
                                            <label class="form-check-label"
                                                   for="module-{{ $module }}">
                                                {{ ucfirst($module) }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Options</label>
                        <div class="list-group">
                            <label class="list-group-item">
                                <input class="form-check-input me-1"
                                       type="checkbox" name="notifications_enabled"
                                       checked>
                                Notifications activées
                            </label>
                            <label class="list-group-item">
                                <input class="form-check-input me-1"
                                       type="checkbox" name="two_factor_enabled">
                                2FA activée
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    {{-- <div class="form-group">
                        <label for="role_id">Rôle principal</label>
                        <select name="role_id" id="role_id" class="form-control" required>
                            <option value="">Sélectionnez un rôle</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label required">Téléphone</label>
                            <input type="tel" name="phone" class="form-control"
                                   required pattern="[+0-9\s]{8,20}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control">
                    </div>
                </div>
            </div>

            <!-- Section Adresse -->
            <div class="form-group">
                <label for="address">Adresse complète</label>
                <textarea name="address" id="address" class="form-control" rows="3"></textarea>
            </div>

            <!-- Section Préférences -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="locale">Langue par défaut</label>
                        <select name="locale" id="locale" class="form-control">
                            <option value="fr" selected>Français</option>
                            <option value="en">English</option>
                            <option value="es">Español</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="currency">Devise par défaut</label>
                        <select name="currency" id="currency" class="form-control">
                            <option value="EUR" selected>EUR (Euro)</option>
                            <option value="USD">USD (Dollar US)</option>
                            <option value="XOF">XOF (Franc CFA)</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label>Accès aux modules</label>
                        <div class="d-flex flex-wrap">
                            @foreach ($modules as $module)
                                <div class="form-check me-3 mb-2">
                                    <input type="checkbox" name="module_access[]" value="{{ $module }}"
                                           id="module-{{ $module }}" class="form-check-input">
                                    <label for="module-{{ $module }}" class="form-check-label">
                                        {{ ucfirst($module) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Section Options -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="status" id="status"
                               class="form-check-input" checked>
                        <label for="status" class="form-check-label">Compte actif</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="is_admin" id="is_admin"
                               class="form-check-input">
                        <label for="is_admin" class="form-check-label">Accès administrateur</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="notifications_enabled" id="notifications_enabled"
                               class="form-check-input" checked>
                        <label for="notifications_enabled" class="form-check-label">
                            Activer les notifications
                        </label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check">
                        <input type="checkbox" name="two_factor_enabled" id="two_factor_enabled"
                               class="form-check-input">
                        <label for="two_factor_enabled" class="form-check-label">
                            Authentification à deux facteurs
                        </label>
                    </div>

                    <div class="form-group mt-3">
                        <label for="preferences">Préférences utilisateur (JSON)</label>
                        <textarea name="preferences" id="preferences"
                                  class="form-control" rows="2"
                                  placeholder='{"theme": "clair", "items_par_page": 50}'></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
@endsection
