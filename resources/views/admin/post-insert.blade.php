

@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")
    @include("admin.navigation")

    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        <form class="form-signin" method="POST" <?php !empty($post) ? print "action=\"/updatePostAction/$post->id\"" : print "action=\"/insertPostAction\"" ?>>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('lang.admin_post_url') }}</label>
                <input type="text" id="slug" name="slug" class="form-control"  placeholder="{{ trans('lang.admin_post_url_placeholder') }}" <?php if(!empty($post->slug)) echo "value= '" . $post->slug . "'" ?> required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">{{ trans('lang.admin_post_category') }}</label>
            <select name="category" style="margin-bottom: 10px">
                <option value="Travel" <?php if(!empty($post->cat_slug) && $post->cat_slug == "Travel") echo "selected" ?>>Travel</option>
                <option value="Foodie" <?php if(!empty($post->cat_slug) && $post->cat_slug == "Foodie") echo "selected" ?>>Foodie</option>
                <option value="Cooking" <?php if(!empty($post->cat_slug) && $post->cat_slug == "Cooking") echo "selected" ?>>Cooking</option>
                <option value="Lifestyle" <?php if(!empty($post->cat_slug) && $post->cat_slug == "Lifestyle") echo "selected" ?>>Lifestyle</option>
            </select>
            </div>

            <span style="font-size: 40px;">
                English
            </span>

            <div class="form-group">
                <input type="text" id="en-title" name="en-title" class="form-control" placeholder="{{ trans('lang.admin_post_title') }}" <?php if(!empty($enLang->title)) echo "value= '" . $enLang->title . "'" ?>>
            </div>

            <div class="form-group">
                <textarea class="form-control" id="en-summary-ckeditor" name="en-ckeditor"><?php if(!empty($enLang->description)) echo $enLang->description ?></textarea>
            </div>


            <span style="font-size: 40px;">
                Thailand
            </span>

            <div class="form-group">
                <input type="text" id="tha-title" name="tha-title" class="form-control" placeholder="{{ trans('lang.admin_post_title') }}" <?php if(!empty($thaLang->title)) echo "value= '" . $thaLang->title . "'" ?>>
            </div>

            <div class="form-group">
                <textarea class="form-control" id="tha-summary-ckeditor" name="tha-ckeditor"><?php if(!empty($thaLang->description)) echo $thaLang->description ?></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block btn-signin"
                    type="submit"><?php !empty($post) ? print "UPDATE" : print "ADD" ?></button>
            </div>
        </form>

        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

        <script>

            // This call can be placed at any point after the
            // <textarea>, or inside a <head><script> in a
            // window.onload event handler.

            // Replace the <textarea id="editor"> with an CKEditor
            // instance, using default configurations.
            CKEDITOR.replace('en-summary-ckeditor');

            CKEDITOR.replace('tha-summary-ckeditor');

        </script>
    </div>
</div>

@include("partials.endpage")
</body>
</html>
