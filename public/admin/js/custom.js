function people_init() {
                    //Prepare jTable
                    $('#people-container').jtable({
                        title: 'Users',
                        useBootstrap: true,
                        // paging: true,
                        // sorting: true,
                        // defaultSorting: 'uid ASC',
                        selecting: true, //Enable selecting
                        selectingCheckboxes: true, //Show checkboxes on first column
                        actions: {
                            listAction: '/services/ajax/users/list',
                            createAction: '/services/ajax/users/create',
                            updateAction: '/services/ajax/users/update',
                            deleteAction: '/services/ajax/users/delete'
                        },
                        fields: {
                            id: {
                                key: true,
                                create: false,
                                edit: false,
                                list: false
                            },
                            firstname: {
                                title: 'First Name'
                            },
                            lastname: {
                                title: 'Last Name'
                            },
                            type: {
                                title: 'User Type',
                                options: { 'P': 'Patient', 'A': 'Admin', 'N': 'Nurse', 'H': 'Head Nurse', 'D': 'Doctor' }
                            },
                            username: {
                                title: 'Username',
                                edit: false
                            },
                            email: {
                                title: 'Email'
                            },
                            isactive: {
                                title: 'Status',
                                options: { '0': 'Inactive', '1': 'Active' },
                                create: false
                            },
                            dt: {
                                title: 'Signed up',
                                type: 'date',
                                create: false,
                                edit: false
                            }
                        }
                    });

                    //Load person list from server
                    $('#people-container').jtable('load');
                }

                function tasks_init() {
                    //Prepare jTable
                    $('#tasks-container').jtable({
                        title: 'All Tasks',
                        // useBootstrap: true,
                        // paging: true,
                        // sorting: true,
                        // defaultSorting: 'uid ASC',
                        selecting: true, //Enable selecting
                        selectingCheckboxes: true, //Show checkboxes on first column
                        actions: {
                            listAction: '/services/ajax/tasks/list',
                            createAction: '/services/ajax/tasks/create',
                            updateAction: '/services/ajax/tasks/update',
                            deleteAction: '/services/ajax/tasks/delete'
                        },
                        fields: {
                            task_id: {
                                key: true,
                                create: false,
                                edit: false,
                                list: false
                            },
                            title: {
                                title: 'Task',
                            },
                            category: {
                                title: 'Category',
                                options: '/services/ajax/tasks/categories',
                                list: false
                            },
                            type: {
                                title: 'Type',
                                options: '/services/ajax/tasks/types',
                                list: false
                            },
                            nurse_id: {
                                title: 'Nurse',
                                options: '/services/ajax/users/nurses'
                                // options: {"21":"Nina Bodul","30":"Alex Penik"}
                            },
                            start_date: {
                                title: 'Start Date',
                                type: 'date',
                            },
                            end_date: {
                                title: 'End Date',
                                type: 'date',
                            },
                            created: {
                                title: 'Created',
                                type: 'date',
                                create: false,
                                edit: false
                            }
                        }
                    });

                    //Load person list from server
                    $('#tasks-container').jtable('load');
                }