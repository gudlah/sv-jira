<?php $this->load->view('templates/header'); ?>
<div class="row mt-3">
    <div class="col-3">
        <div class="nav flex-column nav-pills bg-light" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-project-tab" data-toggle="pill" data-target="#v-pills-project" aria-selected="true">Projects</button>
            <button class="nav-link" id="v-pills-user-tab" data-toggle="pill" data-target="#v-pills-user" aria-selected="false">Users</button>
            <button class="nav-link" id="v-pills-priority-tab" data-toggle="pill" data-target="#v-pills-priority" aria-selected="false">Priorities</button>
            <button class="nav-link" id="v-pills-board-tab" data-toggle="pill" data-target="#v-pills-board" aria-selected="false">Boards</button>
            <button class="nav-link" id="v-pills-sprint-tab" data-toggle="pill" data-target="#v-pills-sprint" aria-selected="false">Sprints</button>
            <button class="nav-link" id="v-pills-column-tab" data-toggle="pill" data-target="#v-pills-column" aria-selected="false">Columns</button>
            <button class="nav-link" id="v-pills-card-tab" data-toggle="pill" data-target="#v-pills-card" aria-selected="false">Cards</button>
            <button class="nav-link" id="v-pills-comment-tab" data-toggle="pill" data-target="#v-pills-comment" aria-selected="false">Comments</button>
            <button class="nav-link" id="v-pills-attachment-tab" data-toggle="pill" data-target="#v-pills-attachment" aria-selected="false">Attachments</button>
            <button class="nav-link" id="v-pills-subtask-tab" data-toggle="pill" data-target="#v-pills-subtask" aria-selected="false">Sub Tasks</button>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-project" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-user" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-priority" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-board" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-sprint" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-column" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-card" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-comment" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-attachment" role="tabpanel"></div>
            <div class="tab-pane fade" id="v-pills-subtask" role="tabpanel"></div>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script>
    const baseUrl = '<?= base_url() ?>';
    const url = `${baseUrl}data/`;

    document.addEventListener('DOMContentLoaded', () => renderProject());

    document.addEventListener('click', e => {
        if(e.target.id == 'v-pills-project-tab') {
            renderProject();
        } else if(e.target.id == 'v-pills-board-tab') {
            renderBoard();
        } else if(e.target.id == 'v-pills-user-tab') {
            renderUser();
        } else if(e.target.id == 'v-pills-priority-tab') {
            renderPriority();
        } else if(e.target.id == 'v-pills-sprint-tab') {
            renderSprint();
        } else if(e.target.id == 'v-pills-column-tab') {
            renderColumn();
        } else if(e.target.id == 'v-pills-card-tab') {
            renderCard();
        } else if(e.target.id == 'v-pills-subtask-tab') {
            renderSubTask();
        } else if(e.target.id == 'v-pills-comment-tab') {
            renderComment();
        } else if(e.target.id == 'v-pills-attachment-tab') {
            renderAttachment();
        } else if(e.target.id == 'downloadProject') {
            downloadCsv('tabelProject', 'projects');
        } else if(e.target.id == 'downloadUser') {
            downloadCsv('tabelUser', 'users');
        } else if(e.target.id == 'downloadPriority') {
            downloadCsv('tabelPriority', 'priorities');
        } else if(e.target.id == 'downloadBoard') {
            downloadCsv('tabelBoard', 'boards');
        } else if(e.target.id == 'downloadSprint') {
            downloadCsv('tabelSprint', 'sprints');
        } else if(e.target.id == 'downloadColumn') {
            downloadCsv('tabelColumn', 'columns');
        } else if(e.target.id == 'downloadCard') {
            downloadCsv('tabelCard', 'cards');
        } else if(e.target.id == 'downloadComment') {
            downloadCsv('tabelComment', 'comments');
        } else if(e.target.id == 'downloadAttachment') {
            downloadCsv('tabelAttachment', 'attachments');
        } else if(e.target.id == 'downloadSubTask') {
            downloadCsv('tabelSubTask', 'subtasks');
        }
    });

    const renderProject = () => {
        req({link: 'projects'})
            .then(projects => {
                document.querySelector('#v-pills-project').innerHTML = tabelProject(projects);
            });
    };

    const renderBoard = () => {
        req({link: 'boards'})
            .then(boards => {
                document.querySelector('#v-pills-board').innerHTML = tabelBoard(boards);
            })
    };

    const renderUser = () => {
        req({link: 'users'})
            .then(users => {
                document.querySelector('#v-pills-user').innerHTML = tabelUser(users);
            })
    };

    const renderPriority = () => {
        req({link: 'priorities'})
            .then(priorities => {
                document.querySelector('#v-pills-priority').innerHTML = tabelPriority(priorities);
            })
    };

    const renderSprint = () => {
        req({link: 'sprints'})
            .then(sprints => {
                document.querySelector('#v-pills-sprint').innerHTML = tabelSprint(sprints);
            })
    };

    const renderColumn = () => {
        req({link: 'columns'})
            .then(columns => {
                document.querySelector('#v-pills-column').innerHTML = tabelColumn(columns);
            })
    };

    const renderCard = () => {
        req({link: 'cards'})
            .then(cards => {
                document.querySelector('#v-pills-card').innerHTML = tabelCard(cards);
            })
    };

    const renderSubTask = () => {
        req({link: 'subtasks'})
            .then(subtasks => {
                document.querySelector('#v-pills-subtask').innerHTML = tabelSubTask(subtasks);
            })
    };

    const renderComment = () => {
        req({link: 'comments'})
            .then(comments => {
                document.querySelector('#v-pills-comment').innerHTML = tabelComment(comments);
            })
    };

    const renderAttachment = () => {
        req({link: 'attachments'})
            .then(attachments => {
                document.querySelector('#v-pills-attachment').innerHTML = tabelAttachment(attachments);
            })
    };

    const tabelProject = projects => `<button class="btn btn-sm btn-success" id="downloadProject">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelProjects">
        <table class="table table-bordered table-hover" id="tabelProject">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Name</th>
                    <th>Key</th>
                    <th>Type Key</th>
                </tr>
            </thead>
            <tbody>
                ${projects.map(project => `<tr>
                    <td>${project.project_name}</td>
                    <td>${project.project_key}</td>
                    <td>${project.project_type_key}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelBoard = boards => `<button class="btn btn-sm btn-success" id="downloadBoard">Download CSV</button>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-hover" id="tabelBoard">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Board Type</th>
                </tr>
            </thead>
            <tbody>
                ${boards.map(board => `<tr>
                    <td>${board.project_name}</td>
                    <td>${board.board_name}</td>
                    <td>${board.board_type}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelUser = users => `<button class="btn btn-sm btn-success" id="downloadUser">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelUser">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Locale</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                ${users.map(user => `<tr>
                    <td>${user.user_display_name}</td>
                    <td>${(user.user_email == '')? '-' : user.user_email}</td>
                    <td>${user.user_locale}</td>
                    <td>${(user.user_active == 1)? 'Active' : 'Inactive'}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelPriority = priorities => `<button class="btn btn-sm btn-success" id="downloadPriority">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelPriority">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                ${priorities.map(priority => `<tr>
                    <td>${priority.priority_name}</td>
                    <td>${priority.priority_description}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelSprint = sprints => `<button class="btn btn-sm btn-success" id="downloadSprint">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelSprint">
        <table class="table table-bordered table-hover" style="width: 100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Sprint Name</th>
                    <th>Sprint Goal</th>
                    <th>Sprint Start Date</th>
                    <th>Sprint End Date</th>
                    <th>Sprint State</th>
                </tr>
            </thead>
            <tbody>
                ${sprints.map(sprint => `<tr>
                    <td>${sprint.project_name}</td>
                    <td>${sprint.board_name}</td>
                    <td>${sprint.sprint_name}</td>
                    <td>${sprint.sprint_goal}</td>
                    <td>${sprint.sprint_start_date}</td>
                    <td>${sprint.sprint_end_date}</td>
                    <td>${toCapitalCase(sprint.sprint_state)}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelColumn = columns => `<button class="btn btn-sm btn-success" id="downloadColumn">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelColumn">
        <table class="table table-bordered table-hover" style="width: 100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Sprint Name</th>
                    <th>Column Name</th>
                </tr>
            </thead>
            <tbody>
                ${columns.map(column => `<tr>
                    <td>${column.project_name}</td>
                    <td>${column.board_name}</td>
                    <td>${column.sprint_name}</td>
                    <td>${column.column_name}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelCard = cards => `<button class="btn btn-sm btn-success" id="downloadCard">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelCard">
        <table class="table table-bordered table-hover" style="width: 100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Sprint Name</th>
                    <th>Column Name</th>
                    <th>Card Title</th>
                    <th>Priority Name</th>
                    <th>Card Key</th>
                    <th>Card Description</th>
                    <th>Card Creator</th>
                    <th>Card Assignee</th>
                    <th>Card Reporter</th>
                    <th>Card Created</th>
                    <th>Card Updated</th>
                    <th>Card Started</th>
                    <th>Card Resolved</th>
                </tr>
            </thead>
            <tbody>
                ${cards.map(card => `<tr>
                    <td>${card.project_name}</td>
                    <td>${card.board_name}</td>
                    <td>${card.sprint_name}</td>
                    <td>${card.column_name}</td>
                    <td>${card.card_title}</td>
                    <td>${card.priority_name}</td>
                    <td>${card.card_key}</td>
                    <td>${card.card_description}</td>
                    <td>${card.creator_name}</td>
                    <td>${card.assignee_name}</td>
                    <td>${card.reporter_name}</td>
                    <td>${card.card_created}</td>
                    <td>${card.card_updated}</td>
                    <td>${card.card_started}</td>
                    <td>${card.card_resolved}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelSubTask = subTasks => `<button class="btn btn-sm btn-success" id="downloadSubTask">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelSubTask">
        <table class="table table-bordered table-hover" style="width: 100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Sprint Name</th>
                    <th>Column Name</th>
                    <th>Card Title</th>
                    <th>Sub Task Title</th>
                    <th>Priority Name</th>
                    <th>Sub Task Key</th>
                    <th>Sub Task Description</th>
                    <th>Sub Task Status</th>
                    <th>Sub Task Creator</th>
                    <th>Sub Task Assignee</th>
                    <th>Sub Task Reporter</th>
                    <th>Sub Task Created</th>
                    <th>Sub Task Updated</th>
                    <th>Sub Task Started</th>
                    <th>Sub Task Resolved</th>
                </tr>
            </thead>
            <tbody>
                ${subTasks.map(subTask => `<tr>
                    <td>${subTask.project_name}</td>
                    <td>${subTask.board_name}</td>
                    <td>${subTask.sprint_name}</td>
                    <td>${subTask.column_name}</td>
                    <td>${subTask.card_title}</td>
                    <td>${subTask.sub_task_title}</td>
                    <td>${subTask.priority_name}</td>
                    <td>${subTask.sub_task_key}</td>
                    <td>${subTask.sub_task_description}</td>
                    <td>${subTask.status}</td>
                    <td>${subTask.creator_name}</td>
                    <td>${subTask.assignee_name}</td>
                    <td>${subTask.reporter_name}</td>
                    <td>${subTask.sub_task_created}</td>
                    <td>${subTask.sub_task_updated}</td>
                    <td>${subTask.sub_task_started}</td>
                    <td>${subTask.sub_task_resolved}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelComment = comments => `<button class="btn btn-sm btn-success" id="downloadComment">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelComment">
        <table class="table table-bordered table-hover" style="width: 100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Sprint Name</th>
                    <th>Column Name</th>
                    <th>Card Title</th>
                    <th>Comment Body</th>
                    <th>Comment Author Name</th>
                    <th>Comment Created</th>
                    <th>Comment Updated</th>
                </tr>
            </thead>
            <tbody>
                ${comments.map(comment => `<tr>
                    <td>${comment.project_name}</td>
                    <td>${comment.board_name}</td>
                    <td>${comment.sprint_name}</td>
                    <td>${comment.column_name}</td>
                    <td>${comment.card_title}</td>
                    <td>${comment.comment_body}</td>
                    <td>${comment.author_name}</td>
                    <td>${comment.comment_created}</td>
                    <td>${comment.comment_updated}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;

    const tabelAttachment = attachments => `<button class="btn btn-sm btn-success" id="downloadAttachment">Download CSV</button>
    <div class="table-responsive mt-2" id="tabelAttachment">
        <table class="table table-bordered table-hover" style="width: 100%">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Project Name</th>
                    <th>Board Name</th>
                    <th>Sprint Name</th>
                    <th>Column Name</th>
                    <th>Card Title</th>
                    <th>File Name</th>
                    <th>File</th>
                    <th>Author Name</th>
                    <th>File Created</th>
                </tr>
            </thead>
            <tbody>
                ${attachments.map(attachment => `<tr>
                    <td>${attachment.project_name}</td>
                    <td>${attachment.board_name}</td>
                    <td>${attachment.sprint_name}</td>
                    <td>${attachment.column_name}</td>
                    <td>${attachment.card_title}</td>
                    <td>${attachment.attachment_file_name}</td>
                    <td><a class="btn btn-sm btn-success" target="blank" href="${attachment.attachment_url}"/>Download CSV</td>
                    <td>${attachment.author_name}</td>
                    <td>${attachment.attachment_created}</td>
                </tr>`).join('')}
            </tbody>
        </table>
    </div>`;
</script>
<?php $this->load->view('templates/closure'); ?>