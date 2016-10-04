@if ($data->count())
<h2 class="search-title">{{ trans('homepage.search_result') }}</h2>
<table cellspacing="0" class="table table-responsive shop-table">
    <tbody>
        @foreach ($data as $key => $item)
        <tr class="cart-item">
            <td class="search-image">
                <img src="{{ $item->image }}" class="search-img" />
            </td>
            <td class="product-name">
                <a href="{{ action('Home\ProductController@show', [
                    'id' => $item->id
                ]) }}">{{ $item->name }}</a>
            </td>
            <td class="product-price">
                <span class="">{{ $item->price }} </span>
                {{ trans('homepage.dollar') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h2 class="search-title">{{ trans('homepage.no_result') }}</h2>
@endif
