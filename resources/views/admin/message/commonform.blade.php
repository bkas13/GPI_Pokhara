<div class="row">
    <div class="col-md-12">
        <div class="form-group mt-2">
            <label for="">Message Title</label>
            <input type="text" name="title" value="{{ $message->title ?? '' }}" class="form-control"
                placeholder="Course Title ...">
            {{-- @if ($errors->has('title'))
        <div class="error">{{ $errors->first('firstname') }}</div>
        @endif --}}
        </div>
    </div>
    <div class="col-md-6">
        <label for="">Name</label>
        <input type="text" name="name" value="{{ $message->name ?? '' }}" class="form-control" placeholder="Name">
    </div>

    <div class="col-md-6">
        <label for="">Priority</label>
        <input type="number" name="priority" value="{{ $message->priority ?? '' }}" class="form-control"
            placeholder="priority number">
        @if ($errors->has('priority'))
            <div class="text-danger">{{ $errors->first('priority') }}</div>
        @endif
    </div>

</div>
<div class="form-group mt-2">
    <label for="">Designation</label><br>
    <input type="text" name="designation" value="{{ $message->designation ?? '' }}" class="form-control"
        id="designation" placeholder="Designation">
</div>

<div class="form-group mt-2">
    <label for="">Message Featured Image</label><br>
    @if (isset($message->image))
        <img src="{{ asset($message->image) }}" height="100px" width="100px" alt="">
    @endif
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group mt-2">
    <label for="">Message Description</label>
    <textarea name="description" id="summernote">
        {!! $message->desc ?? '' !!}
    </textarea>
</div>
