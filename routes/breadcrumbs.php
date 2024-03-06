<?php

// Home

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Project 
Breadcrumbs::for('project', function ($trail) {
    $trail->parent('home');
    $trail->push('Projects', route('project'));
});

// Component

Breadcrumbs::for('component', function ($trail) {
    $trail->parent('project');
    $trail->push('Components', route('component'));
});

Breadcrumbs::for('subcomponent', function ($trail) {
    $trail->parent('component');
    $trail->push('Subcomponents', route('subcomponent'));
});

Breadcrumbs::for('activity', function ($trail) {
    $trail->parent('subcomponent');
    $trail->push('Activities', route('activity'));
});



Breadcrumbs::for('plan', function ($trail) {
    $trail->parent('activity');
    $trail->push('Plans', route('plan'));
});

Breadcrumbs::for('create-plan', function ($trail) {
    $trail->parent('plan');
    $trail->push('Create Plan', route('create-plan'));
});

Breadcrumbs::for('progress', function ($trail, $activity, $plan) {
    $trail->parent('plan');
    $trail->push('Progress' . ': ' . $activity, route('show-plan', $plan));
});


Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('Profile', route('profile.index'));
});




Breadcrumbs::for('planProgress', function ($trail, $activity, $plan) {
    $trail->parent('progress_details_select_plan');
    $trail->push($activity, route('show-plan', $plan));
});

Breadcrumbs::for('planProgressZero', function ($trail, $activity) {
    $trail->parent('progress_details_select_plan');
    $trail->push($activity, route('plan.progress'));
});
Breadcrumbs::for('report', function ($trail) {
    $trail->parent('home');
    $trail->push('Report', route('report.index'));
});


Breadcrumbs::for('result', function ($trail) {
    $trail->parent('report');
    $trail->push('Result', route('report.result'));
});


Breadcrumbs::for('irrigation', function ($trail) {
    $trail->parent('home');
    $trail->push('Irrigation Schemes', route('irrigation.index'));
});

Breadcrumbs::for('activity.show', function ($trail, $activity_name, $activity_id) {
    $trail->parent('activity');
    $trail->push($activity_name, route('show-plan', $activity_id));
});


Breadcrumbs::for('progress_details_select_plan', function ($trail) {
    $trail->parent('plan');
    $trail->push('Progress Details', route('plan.progress'));
});
