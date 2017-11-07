                    <table class="table table-bordered" style="margin-top:8px;">
                        <thead>
                            <tr>
                                <th>ID</th> 
                                <th>Tag</th>
                                <th>Sub Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($_category as $category)
                            <tr>
                                <td>{{$category->business_category_id}}</td>
                                <td><input type="checkbox" name=""></td>
                                <td>{{$category->business_category_name}}</td>
                                <td><p style="font-size:20px"><i class="fa fa-tags center  viewSubs" aria-hidden="true" data-id="{{$category->business_category_id}}"></i></p></td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>