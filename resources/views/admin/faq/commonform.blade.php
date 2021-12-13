
<div class="form-group mt-2">
    <label for="">FAQ Title</label>
    <input type="text" name="title" class="form-control" value="{{ $faq->title ?? "" }}" placeholder="FAQ Title ...">
</div>
<div class="form-group mt-2">
    <label for="">Status</label><br>
    <select class="custom-select" name="status" id="inputGroupSelect01">
        <option value="active"
        @if(isset($faq))
        @if($faq->status === "active")
        selected
        @endif
        @endif
        >Active</option>
        <option value="inactive"
        @if(isset($faq))
        @if($faq->status === "inactive")
        selected
        @endif
        @endif>InActive</option>
      </select>
</div>
<div class="form-group mt-2">
    <label for="">FAQ Description</label>
    <textarea name="description" id="summernote">
        {!! $faq->desc ?? "" !!}
    </textarea>
</div>

