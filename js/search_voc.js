function get_voc(e) {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './lib/search_voc.php', true);
    var voc_data = [];
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // To Do: handle with "No Results Found"
            var data = xhr.responseText.split('<br>');
            
			for (var i = 0; i < data.length-1; i++) {
				var row = data[i].split(',');
				var obj = {
					voc_eng: row[0],
					voc_chi: row[1],
					part_of_speech: row[2]
				};
				voc_data.push(obj);
			}
        }
        var tableBody = document.querySelector('tbody');
        tableBody.innerHTML = '';
        for (var i = 0; i < voc_data.length; i++) {
            var tr = document.createElement('tr');
            tr.classList.add('voc_edit_tb');
            var td1 = document.createElement('td');
            td1.innerHTML = '<span id="tb_eng">' + voc_data[i].voc_eng + '</span>';
            tr.appendChild(td1);
            var td2 = document.createElement('td');
            td2.innerHTML = '<span id="tb_chi">' + voc_data[i].voc_chi + '</span>';
            tr.appendChild(td2);
            var td3 = document.createElement('td');
            td3.innerHTML = '<span id="tb_part_of_speech">' + voc_data[i].part_of_speech + '</span>';
            tr.appendChild(td3);
            var td4 = document.createElement('td');
            td4.innerHTML = '<button type="button" class="tb_btn" id="tb_btn_edit">修改</button><button type="button" class="tb_btn" id="tb_btn_del">刪除</button>';
            tr.appendChild(td4);
            tableBody.appendChild(tr);
        }
    };

    // Add form data to the request
    var formData = new FormData();
    formData.append('keyword_search', document.getElementById('keyword_search').value);
    xhr.send(formData);
}