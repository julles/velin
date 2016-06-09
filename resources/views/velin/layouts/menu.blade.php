@foreach($parentMenus as $parent)
    <?php
    /*
    @if($parent->childs()->count() == 0)
        <li>
            <a href = "{{ Velin::urlBackend($parent->slug.'/index') }}">{{ $parent->title }}</a>
        </li>
    @else
    */
    ?>
        <?php
        $countChild = Velin::countChildAndGetIndex($parent);
        ?>
        
        @if($countChild == true)
           
        <li class="dropdown">
            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                {{ $parent->title }} <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                @foreach($parent->childs as $child)
                    <?php
                        $indexIfExist = Velin::cekRigtMenuAction('index',$child->slug);
                    ?> 
                    @if($indexIfExist == true) 
                        <li>
                            <a tabindex="-1" href="{{ Velin::urlBackend($child->slug.'/index') }}">{{ $child->title }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
        @endif
    <?php /*@endif */ ?>
@endforeach