namespace MINIPROJ_heritage_TESTS
{
    partial class Form1
    {
        private System.ComponentModel.IContainer components = null;

        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Code généré par le Concepteur Windows Form

        private void InitializeComponent()
        {
            this.txtSortie = new System.Windows.Forms.TextBox();
            this.SuspendLayout();
            //
            // txtSortie
            //
            this.txtSortie.Dock = System.Windows.Forms.DockStyle.Fill;
            this.txtSortie.Font = new System.Drawing.Font("Consolas", 10F);
            this.txtSortie.Multiline = true;
            this.txtSortie.Name = "txtSortie";
            this.txtSortie.ReadOnly = true;
            this.txtSortie.ScrollBars = System.Windows.Forms.ScrollBars.Both;
            this.txtSortie.WordWrap = false;
            //
            // Form1
            //
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(900, 450);
            this.Controls.Add(this.txtSortie);
            this.Name = "Form1";
            this.Text = "Tests Héritage Arme / Epee";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.ResumeLayout(false);
            this.PerformLayout();
        }

        #endregion

        private System.Windows.Forms.TextBox txtSortie;
    }
}
