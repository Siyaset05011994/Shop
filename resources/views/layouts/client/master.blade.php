<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>
    body {
        margin: 30px 0px;
    }
    .navbar-default .navbar-nav > li.dropdown:hover > a,
    .navbar-default .navbar-nav > li.dropdown:hover > a:hover,
    .navbar-default .navbar-nav > li.dropdown:hover > a:focus {
        background-color: rgb(231, 231, 231);
        color: rgb(85, 85, 85);
    }
    li.dropdown:hover > .dropdown-menu {
        display: block;
    }

    ul.dropdown-menu > li{
        display: inline-block;
    }


    ul{
        list-style: none;
    }
</style>
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav " id="ul1">
                    @foreach($categories as $category)

                        <li class="dropdown">
                            <a href="{{route('client.categories',$category->seo_url)}}" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}} <b class="caret"></b></a>

                            @if($category->childs->isNotEmpty())
                                    @include('partials.client.header.sub_category_list', [
                                        'childs' => $category->childs,
                                        'class' => 'dropdown-menu',
                                    ])
                            @endif
                        </li>

                    @endforeach
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
