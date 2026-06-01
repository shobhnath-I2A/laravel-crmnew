<div class="row"
    style="background-color:#06304c;margin-bottom:38px;z-index:99;position:fixed;left:30px;width:100%;margin:0;top:46px;border-top:1px solid #ffffff61;">

    <div class="container-fluid topnavigation" style="position:relative;">
        <ul class="nav nav-tabs" style="border:0px;">

            <li class="nav-item">
                @if (isset($itinerary) && $itinerary->queryId > 0)
                    <a class="nav-link"
                       href="{{ route('queries.show', ['id' => $itinerary->queryId, 'tab' => 'proposals']) }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;QUERY
                    </a>
                @else
                    <a class="nav-link" href="{{ route('itineraries.index') }}">
                        <i class="fa fa-arrow-left"></i> &nbsp;ITINERARIES
                    </a>
                @endif
            </li>

            <li class="nav-item">
    <a class="nav-link {{ activeRoute('itineraries.show') }}"
       href="{{ route('itineraries.show', $itinerary->id) }}">
        BUILD
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ activeRoute('itineraries-price.index') }}"
       href="{{ route('itineraries-price.index', $itinerary->id) }}">
        PRICING
    </a>
</li>

<li class="nav-item">
    <a class="nav-link {{ activeRoute('itineraries.final') }}"
       href="{{ route('itineraries.final', $itinerary->id) }}">
        FINAL
    </a>
</li>

            <li class="nav-item" style="position:absolute;right:247px;">
                <a href="#" class="nav-link"
                   onclick="loadpop('View Quotation',this,'1000px')"
                   data-toggle="modal"
                   data-target=".bs-example-modal-center"
                   popaction="action=viewquotation&id={{ $itinerary->id }}">
                    <i class="fa fa-file-text"></i> &nbsp;Quotation
                </a>
            </li>

            <li class="nav-item" style="position:absolute;right:120px;">
                <a href="#" class="nav-link"
                   onclick="loadpop('Export Itinerary',this,'500px')"
                   data-toggle="modal"
                   data-target=".bs-example-modal-center"
                   popaction="action=exportitinerary&pid={{ $itinerary->id }}">
                    <i class="fa fa-file-text"></i> &nbsp;Export
                </a>
            </li>

            <li class="nav-item" style="position:absolute;right:0;">
                <a href="#" class="nav-link"
                   onclick="loadpop('Share',this,'700px')"
                   data-toggle="modal"
                   data-target=".bs-example-modal-center"
                   popaction="action=shareitinerary&pid={{ $itinerary->id }}">
                    <i class="fa fa-paper-plane"></i> &nbsp;Share
                </a>
            </li>

        </ul>
    </div>
</div>
