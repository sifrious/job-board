<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from 'vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <el-menu
      :default-active="activeIndex"
      class="el-menu-demo"
      mode="horizontal"
      :ellipsis="false"
      @select="handleSelect"
    >
      <el-menu-item class="logo-container">
        <img
          style="width: 50px"
          src="/images/nepatechlogo.jpeg"
          alt="Element logo"
        />
        <h1 class="logo-container nav-title">Jobs Board</h1>
      </el-menu-item>
      <div class="flex-grow" />
      <el-menu-item index="1">Browse Jobs</el-menu-item>
      <el-menu-item index="2">
        Create Job Listing
      </el-menu-item>
      <el-menu-item index="3">
        Login
      </el-menu-item>
    </el-menu>
  </template>
  
  <style>
  .flex-grow {
    flex-grow: 1;
  }

  .logo-container {
    margin: 4px 50px 0 20px;
  }
  .nav-title {
    font-size: 2.4em;
  }

  </style>
  