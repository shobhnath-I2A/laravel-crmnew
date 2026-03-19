@extends('layouts.app')
@section('content')
    </div>

    <style>
        #load_build_day_details {
    transition: all 0.3s ease;
}
        .topnavigation .nav-pills .nav-link.active,
        .nav-tabs .nav-link.active {
            font-size: 16px;
            font-weight: 700;
            background: #ffffff26;
            color: #fff;
            border-bottom: 2px solid #ffffffb5;
            color: #ffffff;
        }

        .topnavigation .nav-pills .nav-link,
        .nav-tabs .nav-link {
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 400;
            border: 0px;
            color: #ffffffcc;
            border-radius: 0px;
            padding: 10px 35px;
            border-bottom: 2px solid transparent;
            color: #ffffff;
            border-radius: 4px;
            margin: 5px;
            border-radius: 4px;
        }

        .topnavigation .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            border-color: transparent;
        }
    </style>
    <style>
        .itidaytab {
            border: 1px solid #ecf0f2;
            padding: 10px 15px;
            text-align: left;
            font-weight: 700;
            cursor: pointer;
            position: relative;
        }

        .itidaytab:hover {
            border: 1px solid #ecf0f2;
            background-color: #eff9ff;
        }

        .activedaytab {
            border: 1px solid #ecf0f2;
            background-color: #009fff73 !important;
            border-left: 2px solid #000 !important;
        }

        .itidaytab .fa-chevron-right {
            color: #2b4f67ba;
            position: absolute;
            right: 10px;
            font-size: 12px;
            top: 15px;
        }

        .itidaytab:hover .fa-chevron-right {
            color: #45bbff;
        }

        .activedaytab .fa-chevron-right {
            color: #000;
        }

        .itidaytab span {
            background-color: #000;
            color: #fff;
            padding: 3px 8px;
            border-radius: 40px;
            line-height: 17px;
            display: inline-block;
            border: 2px solid #ddd;
        }

        .itidaytab select {
            padding: 7px 5px;
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            height: auto;
            border: 0px;
            margin: 10px 0px;
        }

        .addeventbtnn {
            background-color: #333333;
            color: #FFFFFF;
            width: 40px;
            height: 40px;
            text-align: center;
            border-radius: 40px;
            font-size: 16px;
            line-height: 38px;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0px 0px 3px #b7b7b7;
        }

        .addeventbtnn:hover {
            background-color: #23ae73;
        }

        #loadeventlibrary .daydetailsbox {
            background-color: #fff;
            margin: 10px 10px 10px 0px;
        }

        .reorder-controls {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .reorder-controls button {
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #2b4f67;
            margin-right: 10px;
        }

        .reorder-controls button i {
            color: #fff;
            font-size: 12px;
        }

        .reorder-controls button:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }
    </style>
    <div class="wrapper">
        <div class="row"
            style="background-color: #06304c; margin-bottom: 38px; z-index: 99; position: fixed; left: 30px; width: 100%; margin: 0px; top: 46px; border-top: 1px solid #ffffff61;">
            <div class="container-fluid topnavigation" style=" position: relative;">
                <ul class="nav nav-tabs" style="border:0px;">
                    <li class="nav-item">
                        @if (isset($itinerary) && $itinerary->queryId > 0)
                            <a class="nav-link {{ $tab == 'proposals' ? 'active' : '' }}"
                                href="{{ route('queries.show', ['id' => $itinerary->queryId, 'tab' => 'proposals']) }}">
                                <i class="fa fa-arrow-left"></i> &nbsp;QUERY
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('itineraries.index') }}">
                                <i class="fa fa-arrow-left"></i> &nbsp;ITINERARIES
                            </a>
                        @endif
                    </li>
                    <li class="nav-item"><a class="nav-link"
                            href="display.html?ga=itineraries&amp;view=1&amp;id=109135">BUILD</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="display.html?ga=itineraries&amp;view=1&amp;id=109135&amp;b=2">PRICING</a></li>

                    <li class="nav-item"><a class="nav-link"
                            href="display.html?ga=itineraries&amp;view=1&amp;id=109135&amp;b=4">FINAL</a></li>

                    <!-- <li class="nav-item" style="position:absolute; right:120px;"><a  class="nav-link" href="http://localhost:8081/API/tcpdf/pdf/download-package.php?pageurl=http://localhost:8081/API/downloadpackagepdf.php?id=109135" ><i class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Exportddd</a></li> -->

                    <li class="nav-item" style="position:absolute; right:247px;"><a href="#" class="nav-link"
                            onclick="loadpop('View Quotation',this,'1000px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=viewquotation&amp;id=109135"><i
                                class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Quotation</a></li>
                    <li class="nav-item" style="position:absolute; right:120px;"><a href="#" class="nav-link"
                            onclick="loadpop('Export Itinerary',this,'500px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=exportitinerary&amp;pid=109135"><i
                                class="fa fa-file-text" aria-hidden="true"></i> &nbsp;Export</a></li>
                    <li class="nav-item" style="position:absolute; right:0px;"><a class="nav-link" href="#"
                            onclick="loadpop('Share',this,'700px')" data-toggle="modal"
                            data-target=".bs-example-modal-center" popaction="action=shareitinerary&amp;pid=109135"><i
                                class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Share</a></li>

                </ul>
            </div>
        </div>
        <div style="padding:10px;">
            <div class="card" style="padding:10px; margin-top:40px;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="min-height:600px;">
                    <tbody>
                        <tr>
                            <td colspan="2" align="left" valign="top" style="border:1px solid #ecf0f2;">
                                <div style="height:150px; overflow:hidden; position:relative;" class="coverBanner">
                                    <img src="" style="width:100%; height:auto; min-height:100%;">
                                    <div
                                        style="background-color: #000000ba; color: #fff; padding: 10px 20px; font-size: 25px; position: absolute; left: 0px; bottom: 0px; width: 100%; font-weight: 600;">
                                        {{ $itinerary->name }}
                                        <a onclick="openSidebar('Edit Itinerary','{{ route('itineraries.edit', $itinerary->id) }}')"
                                            style="font-size:18px; cursor:pointer;">&nbsp;&nbsp;<i class="fa fa-pencil"
                                                aria-hidden="true"></i>
                                        </a>

                                    </div>
                                    <a style="font-size: 13px; background-color: #00000082; color: #fff; cursor: pointer; position: absolute; right: 10px; top: 10px; padding: 5px 10px;border-radius: 4px;"
                                        onclick="loadpop('Media library',this,'600px')" data-toggle="modal"
                                        data-target=".bs-example-modal-center"
                                        popaction="action=medialibrary&amp;afunctin=changeCoverPhoto&amp;pid=109135&amp;destinations=delhi"><i
                                            class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;Change Cover Photo
                                    </a>
                                </div>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="25%" colspan="2" align="left" valign="top"
                                                style="border-right:1px solid #ecf0f2;">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay())
                                                    <div class="itidaytab" data-day="{{ $i }}"
                                                        data-date="{{ $date->format('Y-m-d') }}">
                                                        {{-- <div class="itidaytab {{ $i == 1 ? 'activedaytab' : '' }}" id="dayid{{ $i }}"  onclick="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');"> --}}
                                                        <strong><span>{{ $i }}</span>
                                                            {{ $date->format('d M - D') }}</strong>
                                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                        <select id="destinationName{{ $i }}"
                                                            class="form-control"
                                                            onchange="load_build_day_details('{{ $i }}','{{ $date->format('Y-m-d') }}');">
                                                            <option value="{{ $itinerary->destinations }}"
                                                                selected="selected">{{ $itinerary->destinations }}
                                                            </option>
                                                        </select>
                                                        <div class="reorder-controls">
                                                            <button class="btn-move-up" data-day-order="1"
                                                                disabled="">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </button>
                                                            <button class="btn-move-down" data-day-order="1">
                                                                <i class="fa fa-chevron-down"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @php $i++; @endphp
                                                @endfor
                                                <div class="itidaytab" id="dayid100000"
                                                    onclick="load_build_day_details('100000','2026-05-04');">
                                                    <strong><i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp;
                                                        Package Terms</strong>
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                </div>
                                            </td>
                                            <td align="left" valign="top">
                                                <div id="load_build_day_details">
                                                    @include('itinerary.itinerary-days-details')
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            @include('itinerary.add-itinery-days')
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


       <script>
class ItineraryBuilder {
    constructor(config) {
        this.container = document.querySelector(config.container);
        this.wrapper = document.querySelector(config.wrapper);
        this.endpoint = config.endpoint;

        this.activeClass = config.activeClass || 'activedaytab';

        this.state = {
            activeDay: null,
            activeDate: null
        };

        this.cache = {};
        this.timer = null;

        this.init();
    }

    init() {
        this.bindEvents();
        this.autoLoadFirst();
    }

    // ✅ EVENT DELEGATION (IMPORTANT)
    bindEvents() {
        this.wrapper.addEventListener('click', (e) => {

            const tab = e.target.closest('.itidaytab');
            if (tab) {
                this.handleTabClick(tab);
            }

            const moveUp = e.target.closest('.btn-move-up');
            const moveDown = e.target.closest('.btn-move-down');

            if (moveUp) this.moveDay(moveUp, 'up');
            if (moveDown) this.moveDay(moveDown, 'down');

        });
    }

    handleTabClick(tab) {
        const day = tab.dataset.day;
        const date = tab.dataset.date;

        this.setActive(tab);
        this.setState(day, date);
        this.loadDay(day, date);
    }

    setActive(tab) {
        this.wrapper.querySelectorAll('.itidaytab')
            .forEach(t => t.classList.remove(this.activeClass));

        tab.classList.add(this.activeClass);
    }

    setState(day, date) {
        this.state.activeDay = day;
        this.state.activeDate = date;
    }

    showLoading() {
        this.container.innerHTML = `
            <div style="padding:20px;text-align:center;">
                <i class="fa fa-spinner fa-spin"></i> Loading...
            </div>
        `;
    }

    showError() {
        this.container.innerHTML = `
            <div style="padding:20px;color:red;text-align:center;">
                Failed to load data
            </div>
        `;
    }
loadDay(day, date) {
    const key = `${day}_${date}`;

    if (this.cache[key]) {
        this.container.innerHTML = this.cache[key];
        return;
    }

    this.showLoading();

    clearTimeout(this.timer);

    this.timer = setTimeout(() => {
        fetch(`${this.endpoint}?day=${day}&date=${date}&itinerary_id={{$itinerary->id}}`)
            .then(res => res.json())
            .then(data => {
                if (data.html) {
                    this.container.innerHTML = data.html;
                    this.cache[key] = data.html;
                } else {
                    this.showError();
                }
            })
            .catch(() => this.showError());
    }, 200);
}
    // 🔥 DAY REORDER (Premium Feature)
    moveDay(btn, direction) {
        const tab = btn.closest('.itidaytab');

        if (direction === 'up' && tab.previousElementSibling) {
            tab.parentNode.insertBefore(tab, tab.previousElementSibling);
        }

        if (direction === 'down' && tab.nextElementSibling) {
            tab.parentNode.insertBefore(tab.nextElementSibling, tab);
        }

        this.updateDayNumbers();
    }

    // 🔢 AUTO UPDATE DAY NUMBERS
    updateDayNumbers() {
        const tabs = this.wrapper.querySelectorAll('.itidaytab');

        tabs.forEach((tab, index) => {
            const span = tab.querySelector('span');
            if (span) span.innerText = index + 1;

            tab.dataset.day = index + 1;
        });
    }

    autoLoadFirst() {
        const firstTab = this.wrapper.querySelector('.itidaytab');
        if (firstTab) firstTab.click();
    }
}

// ✅ INIT
document.addEventListener("DOMContentLoaded", function () {
   new ItineraryBuilder({
    container: '#load_build_day_details',
    wrapper: 'body',
    endpoint: "{{ url('/itinerary/day-details') }}",
    itineraryId: "{{ $itinerary->id }}"
});
});
</script>
    </div>
@endsection
