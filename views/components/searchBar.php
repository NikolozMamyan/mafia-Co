<div class="container">
    <div class="search-container">
        <input type="text" id="search-bar" placeholder="Recherche un covoitureur">
        <button class="search-btn btn_search" onclick=""><i class="fa-solid fa-magnifying-glass search-icon"></i></button>
        <button class="search-btn btn_more wrapper" type="button" onclick="searchFilters()"><i class="fa-solid fa-sliders">&nbsp;</i><span class="d-none d-md-inline">Plus de Critères</span></button>
    </div>

    <div class="d-none p-2" id="filtersList">
        <ul class="list-unstyled d-flex flex-wrap flex-md-nowrap">
            <li class="mx-2">
                <label class="d-flex flex-nowrap">
                    <input type="checkbox" class="checkbox-Primary mt-1" checked>
                    &nbsp;Nom - Prénom
                </label>
            </li>
            <li class="mx-2">
                <label class="d-flex flex-nowrap">
                    <input type="checkbox" class="checkbox-Primary mt-1">
                    &nbsp;Ville / Code postal
                </label>
            </li>
            <li class="mx-2">
                <label class="d-flex flex-nowrap">
                    <input type="checkbox" class="checkbox-Primary mt-1">
                    &nbsp;Autour de moi
                </label>
            </li>
            <li class="mx-2">
                <label class="d-flex flex-nowrap">
                    <input type="checkbox" class="checkbox-Primary mt-1">
                    &nbsp;Sur mon trajet
                </label>
            </li>
        </ul>
    </div>
</div>