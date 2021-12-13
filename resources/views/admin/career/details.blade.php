<div class="modal fade" id="view_content{{ $content->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title text-center" id="exampleModalLabel">{{ getLanguage('careers').' '.getLanguage('name') }} : {{$content->title}}t</h5> --}}
                <h5 class="modal-title text-center" id="exampleModalLabel">Career Name : {{ $content->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>{{ getLanguage('status') }}:</strong>
                    </div>
                    <div class="col-md-6">
                        <strong>{{ $content->status }}</strong>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        {{-- <strong>{{ getLanguage('careers').' '.getLanguage('description') }}:</strong> --}}
                        <strong>Career Description :</strong>
                    </div>
                    <div class="col-md-10">
                        <p>{!! $content->content !!}</p>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        {{-- <strong>{{ getLanguage('careers').' '.getLanguage('file') }}:</strong> --}}
                        <strong>Career Files:</strong>
                    </div>
                    <div class="col-md-10">
                        <a href="{{ asset($content->file) }}" target="#">
                            {{$content->file}}
                            {{-- <img src="{{ asset('thumbnail/' . $content->file) }}" alt="{{$content->file}}"> --}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>
