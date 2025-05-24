<div class="sidebar sidebar-style-2" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      @include('layouts.logoheader')
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">

          <li class="nav-item">
            <a href="{{ url('/') }}">
                <i class="fas fa-home"></i>
                <p>Accueil</p>
            </a>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Menu Principal</h4>
          </li>

            {{-- @if (auth()->user()->hasRole('compagnie')) --}}

              {{-- @elseif (auth()->user()->hasRole('admin')) --}}
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#demande">
                        <i class="fas fa-plus"></i>
                    <p>Catalogue & Article</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="demande">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ url('articles/create') }}">
                                <i class="fas fa-cart-plus"></i>
                            Ajoute article</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('articles') }}">
                                <i class="fas fa-edit"></i>
                            Gere articles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('categories') }}">
                                <i class="fas fa-door-open"></i>
                            Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('emplacements') }}">
                                <i class="fas fa-layer-group"></i>
                            Emplacements</span>
                            </a>
                        </li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#fournisseur">
                        <i class="fas fa-shipping-fast"></i>
                    <p>Fournisseur</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="fournisseur">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ url('fournisseurs/create') }}">
                                <i class="fas fa-plane-departure"></i>
                            Ajoute un fournisseur</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('fournisseurs') }}">
                                <i class="fas fa-toolbox"></i>
                            Gere fournisseurs</span>
                            </a>
                        </li>

                    </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#facture">
                        <i class="fas fa-money-check-alt"></i>
                    <p>Facture</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="facture">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ url('factures/create') }}">
                                <i class="fas fa-sticky-note"></i>
                            Cree une facture</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('factures') }}">
                                <i class="fas fa-server"></i>
                            Gere facture</span>
                            </a>
                        </li>

                    </ul>
                    </div>
                </li>


            {{-- @endif --}}

            {{-- @if (auth()->user()->hasRole('admin')) --}}
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#statistique">
                  <i class="fas fa-chart-pie"></i>
                    <p>Statistique</p>
                    <span class="badge badge-secondary">1</span>
                </a>

              </li>

            {{-- @if (auth()->user()->hasRole('admin')) --}}
              <li class="nav-item">
                  <a data-bs-toggle="collapse" href="#charts">
                      <i class="fas fa-user-tie"></i>
                  <p>Administration</p>
                  <span class="caret"></span>
                  </a>
                  <div class="collapse" id="charts">
                  <ul class="nav nav-collapse">
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#users">
                              <i class="fas fa-users"></i>
                              <p>Utilisateurs</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="users">
                              <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ url('/users') }}">
                                  Liste des Utilisateur</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ url('/users/create') }}">
                                  Cree un Utilisateur</span>
                                  </a>
                              </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#role">
                              <i class="fas fa-user-shield"></i>
                              <p>Roles</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="role">
                              <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ url('/roles') }}">
                                  <span>List des Roles</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ url('/roles/create') }}">
                                  Cree un Roles</span>
                                  </a>
                              </li>
                              </ul>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a data-bs-toggle="collapse" href="#permission">
                              <i class="fab fa-audible"></i>
                              <p>Permission</p>
                              <span class="caret"></span>
                          </a>
                          <div class="collapse" id="permission">
                              <ul class="nav nav-collapse">
                              <li>
                                  <a href="{{ url('/permissions') }}">
                                  <span>List des Permissions</span>
                                  </a>
                              </li>
                              <li>

                                  <a href="{{ url('/permissions/create') }}">
                                      <span>Cree une Permitions</span>
                                  </a>
                              </li>
                              </ul>
                          </div>
                      </li>
                  </ul>
                  </div>
              </li>
            {{-- @endif --}}
        </ul>
      </div>
    </div>
  </div>
