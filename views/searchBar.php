<div class="container">
    <div class="search-container">
        <input type="text" id="search-bar" placeholder="Recherche">
        <button class="search-btn btn_search" onclick=""><i class="fa-solid fa-magnifying-glass search-icon"></i></button>
        <button class="search-btn btn_more wrapper" type="button" onclick="searchFilters()"><i class="fa-solid fa-sliders">&nbsp;</i><span class="d-none d-md-inline">Plus de Critères</span></button>
    </div>

    <div class="d-none mx-3 p-2 bg-P200-o rounded" id="filtersList">
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
                    &nbsp;Ville
                </label>
            </li>
            <li class="mx-2">
                <label class="d-flex flex-nowrap">
                    <input type="checkbox" class="checkbox-Primary mt-1">
                    &nbsp;Code Postal
                </label>
            </li>
        </ul>
    </div>
</div>