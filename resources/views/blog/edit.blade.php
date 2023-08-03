<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Posts
        </h1>
    </div>
</div>

<style>
    .form-group{
        margin: 50px;
    }
</style>




<div class="w-4/5 m-auto pt-20">
    <form action="/blog/{{$post->slug}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{$post->title}}">
    </div>
    <div class="form-group">
    <label>slug</label>
    <input type="text" name="slug" class="form-control"value="{{$post->slug}}">
    </div>
    <div class="form-group">
    <label>Description</label>
    <input type="text" name="description" class="form-control" value="{{$post->description}}">
    </div>
    <div class="bg-grey-lighter pt-15">
        <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
         <span class ="mt-2 text-base leading-normal">
            select a file
       </span>
       <input type="file" name="image" class="hidden">
      </label>
   </div>
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>