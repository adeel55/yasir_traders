<template>
  <footer class="footer">
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="#"><router-link to="/dashboard">Yasir Traders</router-link></a>
          </li>
          <li>
            <a href="#">
              About Us
            </a>
          </li>
          <li>
            <a href="#">
              Help
            </a>
          </li>
          <li>
            <a href="#">
              Services
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright text-center mt-3"> Copyright
        &copy; {{ new Date().getFullYear() }} Yasir Traders.Inc | Developed By:
        <a href="https://www.encodersolutions.pk" target="_blank"
          ><u>Encoders Solutions</u></a>
      </div>
    </div>
  </footer>
</template>
<script>
export default {};
</script>
<style></style>
