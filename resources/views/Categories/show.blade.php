<x-header/>
    <div class="container mt-2" style="margin-bottom: 5em">
          <!-- Show Notifications When Appropriate -->
    <x-notification/>
      <div class="row">
        <div class="col-12 mt-3 mb-3">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
              <li class="text-secondary">You are here: </li>
              <li class="breadcrumb-item ms-2"><a href="/" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i class="bi bi-house-door-fill"></i></a></li>
              <li class="breadcrumb-item"><a href="/" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Categories</a></li>
              <li class="breadcrumb-item">{{$category->name}}</li>
              
            </ol>
          </nav>
        </div>
      </div>
        <div class="row">
            <div class="col-3">
              <!-- Categories Sidebar -->
              <ul class="list-group">
                <li class="list-group-item disabled bg-success text-light" aria-disabled="true">Categories</li>
               
                @foreach ($categories as $indivudualCategory)
                @if ($indivudualCategory->id == $category->id)
                <li class="list-group-item list-group-item-action list-group-item-success active"><span class="link-light" style="text-decoration: none">{{$indivudualCategory->name}}</span>
                  
                </li> 
                
                @else
                <li class="list-group-item list-group-item-action list-group-item-success"><a href="/category/{{$indivudualCategory->id}}" class="link-success" style="text-decoration: none">{{$indivudualCategory->name}}</a></li> 
                @endif
                
                @endforeach
              </ul>
            </div>
            <div class="col-9">
                <div class="card text-center">
                    <div class="card-header bg-primary text-light">
                      Category
                    </div>
                    <div class="card-body">
                      <h1 class="card-title">{{$category -> name}} <span class="badge bg-success bg-gradient fw-light rounded-pill align-middle" style="font-size: 0.45em">{{count($category->posts)}} Posts</span></h1>
                      <p class="card-text">{{$category -> 	description}} </p>
                    </div>
                    <div class="card-footer text-body-secondary">
                      {{$category -> created_at -> diffForHumans()}}
                    </div>
                  </div>
                  <!-- Posts Start -->
                  @if (count($posts) == 0)
                  <div>
                    <div class="list-group mt-3 text-secondary">  
                        <p class="text-center" style="font-size:.95em"><i>No posts has been published for this category yet</i></p>             
                      </div>
                  </div>
                  @else
                  <div>
                    <div class="list-group mt-3">
                      @foreach ($posts as $post)
                        <x-post-compact :post="$post" :likes="$likes"/> 
                      @endforeach                        
                      </div>
                  </div>
                  @endif
            </div>
        </div>
    </div>
<x-footer />