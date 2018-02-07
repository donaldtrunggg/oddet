<div class="w3-container" style="margin: 0 auto; text-align: center; background-color: rgb(232,233,234)">
    <div style="padding-top: 30px; padding-bottom: 50px;">
        <h2>MEMORIES</h2>
    </div>

    <?php $countLength = 0; ?>
    <div class="w3-content w3-display-container">
        <div class="mySlides">
            <div class="w3-cell-row">
                @foreach ($dataFooter as $index => $item)
                    @if($index > 15)
                        @continue;
                    @endif

                    <?php $countLength = $index; ?>
                    @if($index % 4 == 0)
                        <div class="w3-container w3-cell w3-cell-top">
                            @endif
                            <?php $monthName = date('F', mktime(0, 0, 0, $item->month, 10)); ?>
                            <a href="/{{ config('app.locale') }}/gallery/{{ $monthName . '/' .  $item->year }}">
                                <p>{{ $monthName .  ' ' . $item->year }}</p></a>
                            @if($index % 4 == 3)
                        </div>
                    @endif

                @endforeach


                @if($countLength % 4 != 3)
            </div>
            @endif
        </div>
    </div>

    <?php $isMore = false;?>
    @if($countLength < count($dataFooter) - 1)
        <?php
        $dataFooter = array_slice($dataFooter->toArray(), $countLength);
        $dataFooter = (object)$dataFooter;
        $countLength = 0;
        $isMore = true;

        ?>
        <div class="mySlides">
            <div class="w3-cell-row">
                @foreach ($dataFooter as $index => $item)
                    @if($index > 15)
                        @continue;
                    @endif

                    <?php $countLength = $index; ?>

                    @if($index % 4 == 0)
                        <div class="w3-container w3-cell w3-cell-top">
                            @endif
                            <?php $monthName = date('F', mktime(0, 0, 0, $item->month, 10)); ?>
                            <a href="/{{ config('app.locale') }}/gallery/{{ $monthName . '/' .  $item->year }}">
                                <p>{{ $monthName .  ' ' . $item->year }}</p></a>
                            @if($index % 4 == 3)
                        </div>
                    @endif

                @endforeach
                @if($countLength % 4 != 3)
            </div>
            @endif
        </div>
</div>
@endif

@if($isMore)
    <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    @endif
    </div>
    <div style="text-align: center; padding: 30px">
        <hr width="60%"
            style="display: block;margin-top: 0.2em;margin-bottom: 0.5em;margin-left: auto;margin-right: auto;border-style: inset;border: 1px solid #000;">
        <p>Copyright (C) 2017</p>
        <h3>Le Journal by Odette</h3>
    </div>
    </div>