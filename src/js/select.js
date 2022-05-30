$.fn.dataTableExt.oPagination.listboxWithButtons = {
    "fnInit": function (oSettings, nPaging, fnCallbackDraw) {
		var nFirst = document.createElement( 'button' );
		var nLast = document.createElement( 'button' );
        var nBtnPrevious = document.createElement('button');
        var nBtnNext = document.createElement('button');
        var nInput = document.createElement('select');
        var nPage = document.createElement('span');
        var nOf = document.createElement('span');
		nFirst.className = "paginate_button first btn btn-primary-outline";
		nFirst.textContent = "<<";
		nLast.className = "paginate_button last btn btn-primary-outline";
		nLast.textContent = ">>";
        nBtnPrevious.className = "paginate_button previous btn btn-primary-outline";
        nBtnPrevious.textContent = "<";
        nBtnNext.className = "paginate_button next btn btn-primary-outline";
        nBtnNext.textContent = ">";
        nOf.className = "paginate_of";
        nPage.className = "paginate_page";
        if (oSettings.sTableId !== '') {
            nPaging.setAttribute('id', oSettings.sTableId + '_paginate');
        }
        nInput.style.display = "inline";
        nPage.innerHTML = "Page ";
		nPaging.appendChild( nFirst );
        nPaging.appendChild(nBtnPrevious);
        nPaging.appendChild(nPage);
        nPaging.appendChild(nInput);
        nPaging.appendChild(nOf);
		nPaging.appendChild(nBtnNext);
		nPaging.appendChild( nLast );
		 $(nFirst).click(function () {
            if( $(this).hasClass("disabled") )
                return;
            oSettings.oApi._fnPageChange(oSettings, "first");
            fnCallbackDraw(oSettings);
        }).bind('selectstart', function () { return false; });
		$(nLast).click(function () {
            if( $(this).hasClass("disabled") )
                return;
            oSettings.oApi._fnPageChange(oSettings, "last");
            fnCallbackDraw(oSettings);
        }).bind('selectstart', function () { return false; });
        $(nBtnPrevious).click(function () {
            if( $(this).hasClass("disabled") )
                return;
            oSettings.oApi._fnPageChange(oSettings, "previous");
            fnCallbackDraw(oSettings);
        }).bind('selectstart', function () { return false; });
        $(nBtnNext).click(function () {
            if( $(this).hasClass("disabled") )
                return;
            oSettings.oApi._fnPageChange(oSettings, "next");
            fnCallbackDraw(oSettings);
        }).bind('selectstart', function () { return false; });
        $(nInput).change(function (e) {
            window.scroll(0,0);
            if (this.value === "" || this.value.match(/[^0-9]/)) {
                return;
            }
            var iNewStart = oSettings._iDisplayLength * (this.value - 1);
            if (iNewStart > oSettings.fnRecordsDisplay()) {
                oSettings._iDisplayStart = (Math.ceil((oSettings.fnRecordsDisplay() - 1) / oSettings._iDisplayLength) - 1) * oSettings._iDisplayLength;
                fnCallbackDraw(oSettings);
                return;
            }
            oSettings._iDisplayStart = iNewStart;
            fnCallbackDraw(oSettings);
        });
        $('span', nPaging).bind('mousedown', function () {
            return false;
        });
        $('span', nPaging).bind('selectstart', function () {
            return false;
        });
    },
    "fnUpdate": function (oSettings, fnCallbackDraw) {
        if (!oSettings.aanFeatures.p) {
            return;
        }
        var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
        var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
        var an = oSettings.aanFeatures.p;
        for (var i = 0, iLen = an.length; i < iLen; i++) {
            var spans = an[i].getElementsByTagName('span');
            var inputs = an[i].getElementsByTagName('select');
            var elSel = inputs[0];
            if(elSel.options.length != iPages) {
                elSel.options.length = 0;
                for (var j = 0; j < iPages; j++) {
                    var oOption = document.createElement('option');
                    oOption.text = j + 1;
                    oOption.value = j + 1;
                    try {
                        elSel.add(oOption, null);
                    } catch (ex) {
                        elSel.add(oOption);
                    }
                }
                spans[1].innerHTML = "&nbsp;of&nbsp;" + iPages;
            }
          elSel.value = iCurrentPage;
        }
    }
};