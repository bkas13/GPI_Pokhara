@if (isset($course))

    <div class="form-group mt-2">
        <label for="">Course Title</label>
        <input type="text" name="title" class="form-control" value="{{ $course->title ?? '' }}"
            placeholder="Course Title ..." required>
        {{-- @if ($errors->has('title'))
    <div class="error">{{ $errors->first('firstname') }}</div>
    @endif --}}
    </div>


    <div class="form-group">
        <label>Course Category</label>
        <select class="form-control " name="category">
            <option value="">Select Category</option>
            @foreach ($coursecategories as $category)
                <option value="{{ $category->id }}"
                {{$category->id==$course->category_id ? 'selected' : ''}}
                    >{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    {{-- @if ($course->image) --}}

    <div class="form-group mt-2">
        <label for="">Course Featured Image</label><br>
        <img src="{{ asset($course->image) }}" height="200px" width="200px" alt="" id="course_image"><br><br>
        <input type="file" name="course_image" class="form-control" id="course_img">
    </div>
    {{-- @endif --}}


    {{-- @if ($course->file) --}}
    <div class="form-group mt-2">
        <label for="">Course Specific File</label><br>
        <input type="file" name="course_file" class="form-control">
        @if ($course->file)<a href="{{ asset($course->file) }}">Old File</a>
        @endif
    </div>
    {{-- @endif --}}

    <div class="form-group mt-2">
        <label for="">Course Description</label>
        <textarea name="description" id="summernote">
        {!! $course->description !!}
    </textarea>
    </div>

@else

    <div class="form-group mt-2">
        <label for="">Course Title</label>
        <input type="text" name="title" class="form-control" placeholder="Course Title ..." required>
    </div>
    {{-- @dd($coursecategories) --}}

    <div class="form-group">
        <label>Course Category</label>
        <select class="form-control " name="category">
            <option value="">Select Category</option>
            @foreach ($coursecategories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>


    </div>

    </div>
    <div class="form-group mt-2">
        <label for="">Course Featured Image</label><br>
        <img src="" alt="" id="course_image" height="100px" width="100px"><br>
        <input type="file" name="course_image" class="form-control" id="course_img" required>
    </div>

    <div class="form-group mt-2">
        <label for="">Course Syllabus File</label><br><br>
        {{-- <img src="" height="200px" width="200px" alt="" id="course_file"><br><br> --}}
        <input type="file" name="course_file" class="form-control" id="course_img">
    </div>

    <div class="form-group mt-2">
        <label for="">Course Description</label>
        <textarea name="description" id="summernote"></textarea>
    </div>

@endif
