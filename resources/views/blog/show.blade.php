<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            {{$post->title}}
        </h1>
    </div>
</div>


@foreach($posts as $post)
<div class="sm:grid grid-cols-z gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://www.bhphotovideo.com/images/images2500x2500/asus_x553ma_db01_15_6_notebook_computer_1101418.jpg" width="400"alt="">
        </div>
        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4">
                {{$post->title}}
            </h2>

            <span class ="text-gray-500">
                By<span class="font-bold italic text-gray-800">Code</span>,1 day ago
            </span>



            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
               {{$post->description}}
            </p>
            <a href="/blog/{{$post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>

            
            
        </div>

</div>
@endforeach




