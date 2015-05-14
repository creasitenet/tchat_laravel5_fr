
           @foreach ($messages as $m)
           <div class="message">
                <div class="gravatar"> 
                    <img src="{{ $m->user->gravatar() }}" class="img-responsive" alt="{{ $m->username }}" />
                </div>
                <div class"texte">
                    <p class="username">{{ $m->user->username }} <span class="date">le {{ $m->created_at }}</span></p>
                    <p class="textem">{{ $m->texte }}</p>
                </div>
           <div class="clearfix"></div>
           </div>
      	   @endforeach
     