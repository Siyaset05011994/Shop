<ul class="{{$class}}"  style="min-width: 800px;width: auto;margin-bottom: 20px">

    @foreach($childs as $parent)

        <li style="width: 30%">

            <a href="{{route('parentChild',['parent'=>seflink($parent->parent->parent_id==0?$parent->parent->name:\App\Models\Category::select('seo_url')->where('id',$parent->parent->parent_id)->first()->seo_url),'child'=>seflink($parent->name)])}}">{{$parent->name}}</a>

            @if($parent->childs->isNotEmpty())
                @include('partials.client.header.sub_category_list', [
                    'childs' => $parent->childs,
                    'class' => 'customUl',
                ])
            @endif

        </li>

    @endforeach

</ul>
