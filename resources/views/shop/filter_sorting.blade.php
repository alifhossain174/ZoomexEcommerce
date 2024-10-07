<nav class="toolbox sticky-toolbox sticky-content fix-top">
    <div class="toolbox-left">

        <a href="javascript:void(0)" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle btn-icon-left d-block d-lg-none">
            <i class="w-icon-category"></i>
            <span>Filters</span>
        </a>

        <div class="toolbox-item toolbox-sort select-box text-dark">
            <label>Sort By :</label>
            <select class="form-control" name="filter_sort_by" id="filter_sort_by" style="max-width: 12.8rem;" onchange="filterProducts()">
                <option value="">Default Sorting</option>
                <option value="1" @if (isset($sort_by) && $sort_by == 1) selected @endif>Sort by Latest</option>
                <option value="2" @if (isset($sort_by) && $sort_by == 2) selected @endif>Price Low to High</option>
                <option value="3" @if (isset($sort_by) && $sort_by == 3) selected @endif>Price High to Low</option>
            </select>
        </div>

    </div>
</nav>
