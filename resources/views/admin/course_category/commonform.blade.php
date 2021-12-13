<div class="form-group mt-2">
    <label for=""> Category Title</label>
    <input type="text" name="title" class="form-control" placeholder="Category Title ..."
        value="{{ $courseCategory->title ?? '' }}">
</div>

<div class="form-group mt-2">
    <label for=""> Category Description</label>
    <textarea name="description" id="summernote">
            {!! $courseCategory->description ?? '' !!}
        </textarea>
</div>

<div class="form-group">
    <label>Status</label>


        <select class="form-control " name="status">
            <option value="">Select Status</option>
            <option value="active" {{ isset($courseCategory) && $courseCategory->status=='active' ? 'selected' : ''}}>Active</option>
            <option value="inactive"{{ isset($courseCategory) && $courseCategory->status=='inactive' ? 'selected' : ''}}>Inactive</option>
        </select>
</div>
