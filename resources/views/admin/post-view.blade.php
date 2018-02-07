@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")
    @include("admin.navigation")

    <style>
        .fake-a a:hover{
            cursor: pointer;
        }
    </style>
    <div class="w3-container" style="text-align: justify;">
        <table>
            <tr>
                <th>{{ trans('lang.admin_postview_url') }}</th>
                <th>{{ trans('lang.admin_postview_category') }}</th>
                <th>{{ trans('lang.admin_postview_createDate') }}</th>
                <th>{{ trans('lang.admin_postview_option') }}</th>
            </tr>

            @foreach($data as $item)
                <tr>
                    <?php $url = $_SERVER['HTTP_HOST'].'/'.config('app.locale').'/'. $item->slug;?>
                    <td><a href="<?php echo $url; ?>"><?php echo $url ?></a></td>
                    <td>{{ $item->cat_slug }}</td>
                    <td>{{ $item->create_date }}</td>
                    <td class="fake-a">
                        <a href="update/{{ $item->slug }}" >{{ trans('lang.edit') }}</a>
                        <a id="slugDelete" onclick="deleteAction({{$item->slug}})" style="color: #007bff;">{{ trans('lang.delete') }}</a>
                    </td>
                </tr>
            @endforeach

            <div style="padding-left: 300px; padding-top: 50px; width: 100%">
                <ul class="pagination">
                    @if($page > 0)
                        <li><a href="?page={{$page - 1}}" style="padding: 0 10px;">{{$page}}</a></li>
                    @endif
                    <li><a href="?page={{$page}}" style="padding: 0 10px; color: midnightblue">{{ $page + 1 }}</a></li>

                    @if(count($data) > 0)
                        <li><a href="?page={{$page +1}}" style="padding: 0 10px;">{{$page + 2}}</a>
                    @endif
                </ul>
            </div>
        </table>

        <div style="padding-left: 300px; padding-top: 50px; width: 100%">
            <ul class="pagination">
                @if($page > 0)
                    <li><a href="?page={{$page - 1}}" style="padding: 0 10px;">{{$page}}</a></li>
                @endif
                <li><a href="?page={{$page}}" style="padding: 0 10px; color: midnightblue">{{ $page + 1 }}</a></li>

                @if(count($data) > 0)
                    <li><a href="?page={{$page +1}}" style="padding: 0 10px;">{{$page + 2}}</a>
                @endif
            </ul>
        </div>
    </div>
</div>

<div style="margin-top: 30px">
    {{--@include("partials.footer")--}}
</div>

@include("partials.endpage")
</body>
</html>

<script>
    function deleteAction(slug) {
        if (confirm('Are you sure you want to delete this post?')) {
            window.location.href = '/deletePostAction/' + slug;
        } else {
            // Do nothing!
        }
    }
</script>


