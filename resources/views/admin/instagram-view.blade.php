@include("partials/head")

<body>
<div class="container-fluid">
    @include("partials.header")
    @include("partials.navigation")
    @include("partials.about")
    @include("admin.navigation")
    <style>
        .fake-a a:hover {
            cursor: pointer;
        }
    </style>
    <div class="w3-container" style="margin: 0 auto; text-align: justify;">
        <table>
            <tr>
                <th>{{ trans('lang.admin_ins_image') }}</th>
                <th>{{ trans('lang.admin_ins_link') }}</th>
                <th>{{ trans('lang.admin_ins_time') }}</th>
                <th>{{ trans('lang.admin_ins_option') }}</th>
            </tr>

            @foreach($data as $item)
                <tr>
                    <td><img src="{{ $item->image }}" style="width: 200px"></td>
                    <td>{{ $item->link }}</td>
                    <td>{{ $item->day . '/' . $item->month . '/' . $item->year }}</td>
                    <td class="fake-a">
                        <a href="update/{{ $item->id }}">{{ trans('lang.edit') }}</a>
                        <a id="idDelete" onclick="deleteAction({{$item->id}})"
                           style="color: #007bff;">{{trans('lang.delete')}}</a>
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
    function deleteAction(id) {
        if (confirm('Are you sure you want to delete this post?')) {
            window.location.href = '/deleteInstagramAction/' + id;
        } else {
            // Do nothing!
        }
    }
</script>




