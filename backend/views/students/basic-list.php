<?php
use yii\helpers\Url;
?>
<div class="basic-list_index py-4">
    <div class="row position-relative">
        <div class="col-12 f-14 d-flex align-items-center justify-content-between" style="padding: 10px; border-radius:10px;background:#fff;box-shadow:0px 0px 1px 0px gray; display: flex; align-items: center">
            <div class="d-flex align-items-center gap-2">
                <strong style="border-right:1px solid #777;padding-right:10px;margin-right:10px;">
                    Students
                </strong>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 15 15" style="display:block;">
                    <path fill="#000000" fill-rule="evenodd" d="M7.08.222a.6.6 0 0 1 .84 0l6.75 6.64a.6.6 0 0 1-.84.856L13 6.902V12.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5V6.902l-.83.816a.6.6 0 1 1-.84-.856L7.08.222Zm.42 1.27L12 5.918V12h-2V8.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5V12H3V5.918l4.5-4.426ZM7 12h2V9H7v3Z" clip-rule="evenodd"/>
                </svg>
                <span> - Basic List Of Students</span>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-12 p-0">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <form id="classFilterForm" method="get" action="">
                            <select name="class_id" class="form-control selectric" onchange="$('#classFilterForm').submit()">
                                <option value="">All Classes</option>
                                <?php foreach ($classes as $class): ?>
                                    <option value="<?= $class['id'] ?>" <?= $selectedClass == $class['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($class['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Classes</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($students)): ?>
                                <?php foreach ($students as $index => $student): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td>
                                            <?php if ($student->photo): ?>
                                                <img src="/<?= $student->photo ?>" width="35" height="35" class="rounded-circle">
                                            <?php else: ?>
                                                <img src="/assets/img/avatar/avatar-5.png" width="35" height="35" class="rounded-circle">
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?= Url::to(['students/view', 'id' => $student->id]) ?>" class=""> <?= htmlspecialchars($student->name) ?></a></td>
                                        <td><?= htmlspecialchars($student->phone) ?></td>

                                        <td>
                                            <?php
                                            $classNames = array_map(fn($c) => $c->name, $student->classes);
                                            echo implode(', ', $classNames);
                                            ?>
                                        </td>
                                        <td><div class="badge badge-primary">Paid</div></td>
                                        <td>
                                            <div class="text-white">
                                                <a href="" class="btn btn-success btn-icon">
                                                    <i class="fa-solid fa-wallet"></i>
                                                </a>
                                                <a href="<?= Url::to(['students/update', 'id' => $student->id]) ?>" class="btn btn-primary btn-icon">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-icon">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No students found for this class.</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="float-right">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
