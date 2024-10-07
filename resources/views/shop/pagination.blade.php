<p class="showing-info mb-2 mb-sm-0">
    {{$showingResults}}
</p>

@if($products->total() > 16)
<div class="pagination__area bg__gray--color">
    <nav class="pagination justify-content-center">
        {{ $products->links() }}
    </nav>
</div>
@endif
