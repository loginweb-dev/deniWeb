<div class="col-md-12">
    <button type="button" class="btn btn-primary btn-add_image" data-toggle="modal" data-target="#dropzone_modal" style="padding:5px 20px;font-size:50px">
        <span class="voyager-plus"></span>
    </button>
    @forelse ($company_images as $item)
        <div style="display:inline-block;">
            <img src="{{ url('storage').'/'.$item }}" alt="..." height="80px" style="padding:3px">
        </div>
    @empty

    @endforelse
</div>

<script>
    $(document).ready(function(){
        
        // Vaciar el dropzone cada que se inicie el modal
        $('.btn-add_image').click(function(){
            myDropzone.removeAllFiles();
        });

    });
</script>