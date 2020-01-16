
<!-- Grid row -->
<div class="row">
    @forelse ($empresas as $item)
    <!-- Grid column -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    
        <!-- Card -->
    <div class="card card-ecommerce">

        <!-- Card image -->
        <div class="view overlay">

        <img src="{{ asset('storage/'.$item->image) }}" width="100%" style="height:200px" class="img-fluid" alt="">
        <a href="{{ route('company', $item->slug) }}">
            <div class="mask rgba-white-slight"></div>
        </a>

        </div>
        <!-- Card image -->

        <!-- Card content -->
        <div class="card-body">
        <!-- Category & Title -->
        <div style="height:50px">
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">{{ $item->name }}</a></strong></h5>
        </div>

        <span class="badge badge-danger mb-2">{{ $item->category }}</span>
        <!-- Rating -->
        <ul class="rating">
            @php
            $rating = $item->rating;
            @endphp
            
            @for ($i = 0; $i < 5; $i++)
            
            @if ($rating >= 1)
            <li><i class="fas fa-star blue-text"></i></li>
            @elseif($rating > 0 && $rating < 1)    
            <li><i class="fas fa-star-half-alt blue-text"></i></li>
            @else
            <li><i class="far fa-star blue-text"></i></li>
            @endif

            @php
            $rating--;
            @endphp
            
            @endfor
            <li class="text-muted" style="margin-left:5px">{{ number_format($item->rating, 1, ',', '') }}</li>
        </ul>

        <!-- Card footer -->
        {{-- <div class="card-footer pb-0">

            <div class="row mb-0">

            <span class="float-left"><strong>1439$</strong></span>

            <span class="float-right">

                <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                    class="fas fa-shopping-cart ml-3"></i></a>

            </span>

            </div>

        </div> --}}

        </div>
        <!-- Card content -->

    </div>
    <!-- Card -->  
    </div>
    <!-- Grid column -->
    @empty
        <div class="col-md-12">
            <br><br>
            <h2 class="text-center">Oops!... No se encontraron resultados</h2>
        </div>
    @endforelse
    <!-- Grid column -->

</div>
@if (count($empresas))
    <div class="row">
        <div class="col-md-8">
            {{ $empresas->links() }}
        </div>
        <div class="col-md-4 text-right">
            @if(count($empresas)>0)
                <p class="text-muted">Viendo {{ $empresas->firstItem() }} al {{ $empresas->lastItem() }} de {{ $empresas->total() }} Resultados</p>
            @endif
        </div>
    </div>
@endif

<script>
    $(document).ready(function(){
        $('.page-link').click(function(e){
            e.preventDefault();
            let link = $(this).attr('href');
            if(link){
                page = link.split('=')[1];
                empresas_list();
            }
        });
    });
</script>