<div class="sub-layout d-flex flex-row">
    <div class="order-1 custom_scroll">
        {* themes.tpl *}
        {if isset($tpl_files)}
            <h6 class="border-bottom pb-2">Список файлов:</h6>
            <ul class="list-group mb-0 me-2">
                {foreach $tpl_files as $tpl_file}
                    {assign var="file_path" value=$tplDirectory|cat:$tpl_file}
                    {if is_dir($file_path)}
                        <li>
                            <div class="accordion" id="accordion_{$tpl_file|replace:'/':'_'}">
                                <div class="accordion-item">
                                    <h3 class="accordion-header" id="heading_{$tpl_file|replace:'/':'_'}">
                                        <a class="accordion-button collapsed p-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{$tpl_file|replace:'/':'_'}" aria-expanded="false" aria-controls="collapse_{$tpl_file|replace:'/':'_'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                                <path d="M8 1a1 1 0 0 1 1 1v1h6a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4V1z"/>
                                            </svg>
                                            <span class="ps-1">{$tpl_file}</span>
                                        </a>
                                    </h3>
                                    <div id="collapse_{$tpl_file|replace:'/':'_'}" class="accordion-collapse collapse" aria-labelledby="heading_{$tpl_file|replace:'/':'_'}" data-bs-parent="#accordion_{$tpl_file|replace:'/':'_'}">
                                        <div class="accordion-body py-2">
                                            {if is_dir($tplDirectory|cat:$tpl_file)}
                                                {assign var="subfolder_files" value=scandir($tplDirectory|cat:$tpl_file)}
                                                <ul class="list-group mb-0">
                                                    {foreach $subfolder_files as $subfolder_file}
                                                        {if $subfolder_file != '.' && $subfolder_file != '..'}
                                                            <li>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5.615 19h12.77q.269 0 .442-.173t.173-.442V9.613L14.387 5H5.615q-.269 0-.442.173T5 5.615v12.77q0 .269.173.442t.442.173m0 1q-.67 0-1.143-.472Q4 19.056 4 18.385V5.615q0-.67.472-1.143Q4.944 4 5.615 4h9.173L20 9.212v9.173q0 .67-.472 1.143q-.472.472-1.143.472zM7.5 16h9v-1h-9zm0-3.5h9v-1h-9zm0-3.5h5.73V8H7.5zM5 19V5z"/></svg>
                                                                <a href="admin?action=website-templates&sub_action=edit&tpl_file={$tpl_file}/{$subfolder_file}">{$subfolder_file}</a>
                                                            </li>
                                                        {/if}
                                                    {/foreach}
                                                </ul>
                                            {/if}
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    {/if}
                {/foreach}
                {foreach $tpl_files as $tpl_file}
                    {assign var="file_path" value=$tplDirectory|cat:$tpl_file}
                    {if !is_dir($file_path)}
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M5.615 19h12.77q.269 0 .442-.173t.173-.442V9.613L14.387 5H5.615q-.269 0-.442.173T5 5.615v12.77q0 .269.173.442t.442.173m0 1q-.67 0-1.143-.472Q4 19.056 4 18.385V5.615q0-.67.472-1.143Q4.944 4 5.615 4h9.173L20 9.212v9.173q0 .67-.472 1.143q-.472.472-1.143.472zM7.5 16h9v-1h-9zm0-3.5h9v-1h-9zm0-3.5h5.73V8H7.5zM5 19V5z"/></svg>
                            <a href="admin?action=website-templates&sub_action=edit&tpl_file={$tpl_file}">{$tpl_file}</a>
                        </li>
                    {/if}
                {/foreach}
            </ul>
        {/if}
    </div>
    <div class="order-2 flex-grow-1 custom_scroll border-start ps-3">
        {* Form for editing tpl files *}
        {if isset($tpl_file)}
            <h6>Название файла: {if isset($tpl_content)}{$tpl_file}{/if}</h6>
            <textarea class="form-control w-100 h-100 rounded-0" id="tpl_content" spellcheck="false">{if isset($tpl_content)}{$tpl_content}{/if}</textarea>
            <br>
            <button class="btn btn-primary" onclick="saveChanges()">Сохранить изменения</button>
            <div id="status"></div>
            <script>
                function saveChanges() {
                    var tplContent = document.getElementById('tpl_content').value;
                    var tplFile = '{$tpl_file}';
                    var tplDirectory = '{$tplDirectory}';
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            document.getElementById('status').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.open('POST', 'admin?action=website-templates&sub_action=save', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('tpl_file=' + encodeURIComponent(tplFile) + '&tpl_content=' + encodeURIComponent(tplContent) + '&tpl_directory=' + encodeURIComponent(tplDirectory));
                }
                var fatSection = document.getElementById('fatSection');
                fatSection.classList.add('active');
                var filesAndTemplates = document.getElementById('filesAndTemplates');
                filesAndTemplates.classList.add('show');
                var currentLink = document.getElementById('websiteTemplates');
                currentLink.classList.add('active');
            </script>
        {/if}
    </div>
</div>