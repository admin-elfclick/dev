<div class="form-group">
    <label for="parent_id">Category Parent</label>
    <select class="form-control" id="parent_id" name="parent_id">
        <option value="0" @if(isset($cate['parent_id']) && $cate['parent_id'] == 0) selected @endif>Main Category</option>
        @if(!empty($getCategories))
            @foreach($getCategories as $category)
                <option value="{{ $category['id'] }}"
                        @if(isset($cate['parent_id']) && $cate['parent_id'] == $category['id']) selected @endif>
                    {{ $category['name'] }}
                </option>
                @if(!empty($category['sub_categories']))
                    @foreach($category['sub_categories'] as $subCate)
                        <option value="{{ $subCate['id'] }}"
                                @if(isset($cate['parent_id']) && $cate['parent_id'] == $subCate['id']) selected @endif>
                            &nbsp;&raquo;&nbsp; {{ $subCate['name'] }}
                        </option>
                    @endforeach
                @endif
            @endforeach
        @endif
    </select>
</div>
