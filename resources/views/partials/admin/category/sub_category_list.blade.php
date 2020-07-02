<ul style="list-style-type:none">
    @foreach($childs as $parent)
        <li>

            <input {{old('parent_id')==$parent->id?'checked':false}} style="margin-right: 5px" type="radio" class="category_inpt" id="category_input_{{$parent->id}}" value="{{$parent->id}}" name="parent_id">
            <label class="font-weight-normal category_lbl" for="category_input_{{$parent->id}}">{{ $parent->name }}</label>

            @if($parent->childs->isNotEmpty())
                @include('partials.admin.category.sub_category_list', [
                    'childs' => $parent->childs
                ])
            @endif
        </li>
    @endforeach
</ul>
