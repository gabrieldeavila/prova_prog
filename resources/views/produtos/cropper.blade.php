@extends('templates.base')
@section('title', 'Produtos')
@section('h1', 'Página de Produtos')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css" integrity="sha512-5ZQRy5L3cl4XTtZvjaJRucHRPKaKebtkvCWR/gbYdKH67km1e18C1huhdAc0wSnyMwZLiO7nEa534naJrH6R/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div>
        <img id="img-crop" src="{{asset('img/'.$imagem)}}"/>
    </div>
    <form action="{{route('image.store')}}" method="post" id="cortar" >
        @csrf
        <input type="hidden" name="img" id="img">
        <p>
            <input type="submit" value="cortar" class="btn-primary btn">
        </p>
    </form>
@endsection

@push('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" integrity="sha512-IlZV3863HqEgMeFLVllRjbNOoh8uVj0kgx0aYxgt4rdBABTZCl/h5MfshHD9BrnVs6Rs9yNN7kUQpzhcLkNmHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const form = document.getElementById("cortar");

    const image = document.getElementById('img-crop')
    const cropper = new Cropper(image, {
        aspectRatio: 16 / 9,
        crop(event) { },
    })

    form.addEventListener('submit', function(e) {
         e.preventDefault(); 
         document.querySelector("#img").value = cropper.getCroppedCanvas().toDataURL('image/jpeg') 
         this.submit();
    }, false);

</script>

{{-- <script src="{{asset('public/resources/js/cropper.js')}}"></script> --}}
@endpush