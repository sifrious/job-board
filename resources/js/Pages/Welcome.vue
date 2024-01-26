<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavigationTemplate from "@/Layouts/NavigationTemplate.vue";


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
    <NavigationTemplate>
        <slot></slot>
    </NavigationTemplate>
    <Head title="Welcome" />
    <div class="common-layout">
        <el-container>
            <el-main>
                <el-row :gutter="20">
                    <div class="grid-content bg-primary cta-title">
                        Find Work and Talent through NEPA's Premiere Tech Community
                    </div>
                    </el-row>
                <el-row :span="20">
                    <el-col :lg="5" :md="3" :sm="0"></el-col>
                    <el-col :lg="7" :md="9" :sm="24">
                        <div
                            class="el-button button-block"
                            @click="navigateTo"
                        >
                            Browse Jobs
                        </div>
                    </el-col>
                    <el-col :lg="7" :md="9" :sm="24">
                        <div
                            class="el-button button-block"
                            @click="navigateTo"
                        >
                            Create Listing
                        </div>
                    </el-col>
                    <el-col :lg="5" :md="3"></el-col>
                </el-row> 
            </el-main>
        </el-container>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLargeViewport: window.innerWidth > 1000,
        };
    },
    created() {
        window.addEventListener("resize", this.updateViewport);
    },
    beforeDestroy() {
        window.removeEventListener("resize", this.updateViewport);
    },
    methods: {
        updateViewport() {
            this.isLargeViewport = window.innerWidth > 1000;
            console.log(document.getElementById("button-div").classList);
        },
    },
};
</script>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

.primary-button-div {
    display: flexbox;
    padding: 4%;
    width: 100%;
    height: 100%;
}
.button-block {
    display: flex;
    font-size: 2em;
    height: 2.5em;
    text-align: center;
    margin: 2% 10%;
    overflow-wrap: break-word !important;
}
.cta-title {
    display: block;
    font-size: 4em;
    line-height: 0.9em;
    text-align: center;
    margin-top: 6%;
    margin-right: 8px;
    word-wrap: break-word;
    padding: 2% 1% 4% 6%;
    height: 100%;
    width: 100%;
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>

<!-- <div
                    id="button-div"
                    :class="[
                        {
                            'primary-button-div--desktop': isLargeViewport,
                            'primary-button-div--mobile': !isLargeViewport,
                        },
                        'bg-secondary',
                    ]"
                ></div -->
                <!-- .primary-button-div--desktop {
                    justify-content: center;
                    align-items: center;
                    display: flexbox;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    padding: 8% 0;
                    width: 90%;
                } -->