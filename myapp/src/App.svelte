<script>
  import { setContext } from "svelte";
  import { Router, Link, Route } from "svelte-routing";
  let mypluginurl =
    import.meta.env.MODE !== "development"
      ? `${import.meta.env.BASE_URL}`
      : `/`;
  setContext("mypluginurl", mypluginurl);
  let mybaseurl =
    import.meta.env.MODE !== "development"
      ? window.location.origin
      : "http://khairat.test";
  setContext("mybaseurl", mybaseurl);

  let mylinkurl =
    import.meta.env.MODE !== "development"
      ? `/`
      : `${import.meta.env.BASE_URL}`;
  setContext("mylinkurl", mylinkurl);

  import "./assets/js/fontawesome.js";
  import "./assets/js/bootstrap.bundle.min.js";
  import "./assets/js/luqscripts.js";

  import Header from "./parts/Header.svelte";
  import Sidebar from "./parts/Sidebar.svelte";
  import Content from "./parts/Content.svelte";
  import Footer from "./parts/Footer.svelte";

  import Blog from "./pages/Blog.svelte";
  import About from "./pages/About.svelte";
  import Home from "./pages/Home.svelte";

  export let url = "";
</script>

<svelte:head>
  <link href="{mypluginurl}sb-admin/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{mypluginurl}sb-admin/css/styles.css" rel="stylesheet" />
</svelte:head>

<Header />
<div id="layoutSidenav">
  <Sidebar />
  <div id="layoutSidenav_content">
    <main>
      <Router {url}>
        <div>
          <Route path={mylinkurl + "my-account/blog"} component={Blog} />
          <Route path={mylinkurl + "my-account/about"} component={About} />
          <Route path={mylinkurl + "my-account"}>dsdsds</Route>
        </div>
      </Router>
    </main>
    <Footer />
  </div>
</div>
