                 <form class="form-horizontal" method="POST" action="/merchant/add_tag_category" style="">

                      <table class="table table-bordered" style="margin-top:8px;">
                        <thead>
                            <tr>
                                <th>Tag</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($_category as $category)
                            <tr>
                            <input type="hidden" name="business_id" value="{{$category->business_id}}">
                            <td><input type="checkbox" name="checkbox[]" value="{{$category->business_category_id}}" ></td>

                            <td>{{$category->business_category_name}}</td>
                            <td><p style="font-size:20px"><i class="fa fa-search center  viewSubs" aria-hidden="true" name="business_id" data-id="{{$category->business_category_id}}"></i></p></td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                    <div class="web-content">
                        <button type="submit" class="form-button center" name="business_id" >Add Tag</button>
                    </div>
                </form>       