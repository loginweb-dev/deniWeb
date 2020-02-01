
<!-- Grid row -->
<div class="row">
    @forelse ($empresas as $item)
    <!-- Grid column -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    
        <!-- Card -->
    <div class="card card-ecommerce">

        <!-- Card image -->
        <div class="view overlay" style="height:200px;background-image: url({{ asset('storage/'.str_replace('.', '_medium.', $item->image)) }});background-size: cover;background-position: center center;">
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