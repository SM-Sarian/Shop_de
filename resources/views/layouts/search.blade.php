<form action="{{route('fronts.searchPage')}}" method="get">
    <input type="text" class="search-input" name="search" value="{{request()->query('search')}}"
           placeholder="Suchen Sie nach dem Namen des gewünschten Produkts, der Marke oder der Kategorie ...">
    <button type="submit" class="button-search">
        <img src="{{asset('files/images/search.png')}}" alt="">
    </button>
</form>
