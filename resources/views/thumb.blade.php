@foreach ($images as $image)
    @dump($image)
    <img src="{{ asset('events/' . $image) }}" alt="Image" style="max-width: 100px;">
@endforeach
