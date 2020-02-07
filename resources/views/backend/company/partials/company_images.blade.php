<div class="col-md-12">
    <button type="button" class="btn btn-primary btn-add_image" data-toggle="modal" data-target="#dropzone_modal" style="padding:5px 20px;font-size:50px">
        <span class="voyager-plus"></span>
    </button>
    @php
        $cont = 0;
    @endphp
    @forelse ($company_images as $item)
        <div class="preview-img" id="preview-img{{ $cont }}" style="display:inline-block;position:relative;" data-id="{{ $cont }}">
            <div class="div-opacity" id="div-opacity{{ $cont }}">
                <a href="" class="delete-img" data-img="{{ $item }}"><span class="voyager-trash " ></span></a>
            </div>
            <img src="{{ url('storage').'/'.str_replace('.', '_small.', $item) }}" alt="..." height="90px">
        </div>
        @php
            $cont++;
        @endphp
    @empty

    @endforelse

    <form id="form-delete-img" action="" method="post">
        <div class="modal fade" id="deleteImgModal" tabindex="-1" role="dialog" aria-labelledby="deleteImgModal" aria-hidden="true">
            <div class="modal-dialog modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Eliminar imagen</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="imagen">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <p class="text-muted">Estas seguro que deseas eliminar la siguiente imagen?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            </div>
        </div>
    </form>
</div>
<style>
    .div-opacity{
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: 1;
        background-color:rgba(0, 0, 0, 0.6);
        width:100%;
        height:100%;
        text-align:center;
        display: none;
    }
    .delete-img{
        color:white;
        font-size:30px;
        margin: 0;
        position: absolute;top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .delete-img:hover{
        color: #aaa
    }
    
</style>

<script>
    $(document).ready(function(){
        
        // Vaciar el dropzone cada que se inicie el modal
        $('.btn-add_image').click(function(){
            myDropzone.removeAllFiles();
        });

        $('.preview-img').mouseenter(function(e){
            $("#div-opacity"+$(this).data('id')).css("display", "block");
        });
        $(".preview-img").mouseleave(function(e){
            $("#div-opacity"+$(this).data('id')).css("display", "none");
        });

        $('.delete-img').click(function(e){
            e.preventDefault();
            $('#form-delete-img input[name="imagen"]').val($(this).data('img'));
            $('#deleteImgModal').modal('show');
        });

        $('#form-delete-img').on('submit', function(e){
            e.preventDefault();
            $.post("{{ route('remove_images') }}", $('#form-delete-img').serialize(), function(data){
                if(data == 1){
                    toastr.success('Imagen eliminada correctamente.', 'Bien hecho!');
                    cargar_imagenes();
                }else{
                    toastr.error('Ocurrio un problema al eliminar la imagen.', 'Error');
                }
                $('#deleteImgModal').modal('hide');
            });
        });

    });
</script>