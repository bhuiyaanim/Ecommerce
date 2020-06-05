@extends('admin.admin_layouts')

@section('admin_content')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dapple Park</a>
        <span class="breadcrumb-item active">Others</span>
        <span class="breadcrumb-item active">Seo Settings</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Seo Settings</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update SEO Setting </h6>
            <form action="{{ route('update.seo') }}" method="post">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Meta Title</label>
                                <input class="form-control" type="text" name="meta_title" value="{{ $seo->meta_title }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Meta Author</label>
                                <input class="form-control" type="text" name="meta_author" value="{{ $seo->meta_author }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Meta Tag</label>
                                <input class="form-control" type="text" name="meta_tag" value="{{ $seo->meta_tag }}">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Meta Description</label>
                                <textarea class="form-control" name="meta_description">
                                    {{ $seo->meta_description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Google Analytics</label>
                                <textarea class="form-control" name="google_analytics">
                                    {{ $seo->google_analytics }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Bing Analytics</label>
                                <textarea class="form-control" name="bing_analytics">
                                    {{ $seo->bing_analytics }}
                                </textarea>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ $seo->id }}">

                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5" type="submit">Submit </button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div><!-- card -->

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->



<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>

@endsection
